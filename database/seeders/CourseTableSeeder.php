<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            ['name' => 'Yoga', 'description' => 'None', 'minutes' => 60],
            ['name' => 'Dance Fitness', 'description' => "None", 'minutes' => 45],
            ['name' => 'Pilates', 'description' => 'None', 'minutes' => 60],
            ['name' => 'Boxing', 'description' => "None", 'minutes' => 50]
        ]);
    }
}
