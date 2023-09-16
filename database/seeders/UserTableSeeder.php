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
            [
                'name' => 'Member',
                'email' => 'member@email.com',
                'phone' => '6412339444',
                'role' => 'member',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'Instructor',
                'email' => 'instructor@email.com',
                'phone' => '64123323444',
                'role' => 'instructor',
                'password' => Hash::make('123')
            ],
        ]);
    }
}
