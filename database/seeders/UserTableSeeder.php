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
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
