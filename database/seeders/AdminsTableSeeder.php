<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([

            'name'=>'mohamed ali',
            'email'=>'mohamed@gmail.com',
            'password'=>Hash::make('01230123'),  
            'image'=>'admin/assets/image/default.png',            
        ]);
    }
}
