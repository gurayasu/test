<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * IdentityProviders
     *
     * @return void
     */
    function IdentityProviders()
    {
        // IdentityProviderモデルと紐付ける 1対多の関係
        return $this->hasMany(IdentityProvider::class);
    }

    /**
     * ソーシャルログイン処理
     * @param $providerUser プロバイダーユーザ情報
     * @param $provider プロバイダー名
     * @return App\User
     */
    public static function socialFindOrCreate($providerUser, $provider)
    {
        $account = IdentityProvider::whereProviderName($provider)
                    ->whereProviderUserId($providerUser->getId())
                    ->first();

        // すでにアカウントがある場合は、そのユーザを返す
        if ($account) {
            return $account->user;
        }

        $existingUser = User::whereEmail($providerUser->getEmail())->first();

        if ($existingUser) {
            // メールアドレスはユニークの関係上、同一メールアドレスユーザがいる場合は、そのユーザと紐づけて認証プロバイダー情報登録
            $user = DB::transaction(function () use ($existingUser, $providerUser, $provider) {
                $existingUser->update(['auth_type' => AuthType::BOTH]);
                $existingUser->IdentityProviders()->create([
                    'provider_user_id'   => $providerUser->getId(),
                    'provider_name' => $provider,
                ]);

                return $existingUser;
            });
        } else {
            // アカウントがない場合は、ユーザ情報 + 認証プロバイダー情報を登録
            $user = DB::transaction(function () use ($providerUser, $provider) {
                // nameがない時もあるので、その時はnicknameを使う
                $providerUserName = $providerUser->getName() ? $providerUser->getName() : $providerUser->getNickname();
                $user = User::create([
                    'name'  => $providerUserName,
                    'auth_type' => AuthType::SOCIAL,
                    'email' => $providerUser->getEmail(),
                ]);
                $user->IdentityProviders()->create([
                    'provider_user_id'   => $providerUser->getId(),
                    'provider_name' => $provider,
                ]);

                return $user;
            });
        }

        return $user;
    }
}
