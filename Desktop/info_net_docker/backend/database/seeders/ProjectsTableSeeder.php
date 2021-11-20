<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->truncate();
        \DB::table('projects')->insert([
            [
                'name' => "ビル建築",
                'maker_uid' => "1",
                'end_date' => date('Y-m-d H:i:s', strtotime("10 day")),
                'status' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => "修理",
                'maker_uid' => "1",
                'end_date' => date('Y-m-d H:i:s', strtotime("1 day")),
                'status' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => "西村邸施工",
                'maker_uid' => "2",
                'end_date' => date('Y-m-d H:i:s', strtotime("1 month")),
                'status' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
        ]);
    }
}

