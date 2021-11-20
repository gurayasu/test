<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Datetime;

class ProjectDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('project_details')->truncate();
        \DB::table('project_details')->insert([
            [
                'project_id' => 1,
                'category_id' => 1,
                'item_name' => "鉄筋",
                'unit_num' => "1kg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'project_id' => 1,
                'category_id' => 2,
                'item_name' => "コンクリート",
                'unit_num' => "2kg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'project_id' => 2,
                'category_id' => 2,
                'item_name' => "ゴム",
                'unit_num' => "4kg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'project_id' => 2,
                'category_id' => 5,
                'item_name' => "土",
                'unit_num' => "100kg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'project_id' => 2,
                'category_id' => 6,
                'item_name' => "木材",
                'unit_num' => "100kg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        ]);
    }
}
