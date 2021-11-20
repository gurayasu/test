<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->truncate();
        \DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => "鉄筋",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'id' => 2,
                'name' => "コンクリート",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'id' => 3,
                'name' => "ゴム",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'id' => 4,
                'name' => "水",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'id' => 5,
                'name' => "土",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'id' => 6,
                'name' => "木材",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        ]);
    }
}
