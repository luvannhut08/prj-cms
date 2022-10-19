<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("managers")->insert([
            'name' => 'Admin',
            'email' => 'admin@lunatech.vn',
            'password' => Hash::make('Admin123'),
            'role' => 'A',
            'gender' => 1,
            'address' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
