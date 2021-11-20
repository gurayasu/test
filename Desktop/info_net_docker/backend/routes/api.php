<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'api'], function () {

    Route::get('/projects', [ProjectsController::class, 'except' => ['create', 'edit']]);
    //Route::get('/projects', [ProjectsController::class, 'index']);
    // Route::get('projects', 'App\Http\Controllers\Api\ProjectsController@index');
    // //以下GSで使ったコード
    // Route::resource('projects', 'App\Http\Controllers\Api\ProjectsController', ['except' => ['create', 'edit']]);
});

//Route::get('/projects', [ProjectsController::class, 'index']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
