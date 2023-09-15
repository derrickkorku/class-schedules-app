<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Derrick Korku', 'email' => 'derek@email.com', 'role' => 'member', 'password' => Hash::make('123')],
            ['name' => 'Instructor', 'email' => 'instructor@email.com', 'role' => 'instructor', 'password' => Hash::make('123')],
            ['name' => 'Administrator', 'email' => 'admin@email.com', 'role' => 'admin', 'password' => Hash::make('123')],
        ]);
    }
}