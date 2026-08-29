<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Insert data ke tabel roles
        DB::table('roles')->insert([
            'id' => 1,
            'nama_role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Insert data ke tabel users
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 1,
            'no_telp' => '081234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}