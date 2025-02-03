<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // تأكد من استيراد الموديل الصحيح
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
        ]);
    }
}