<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "name" => "Admin",
                "email" => "admin@mottor.com",
                "password" => bcrypt('admin'),
                "phone" => "08987654321",
                "role_id" => 1,
            ],
            [
                "name" => "panca",
                "email" => "panca@gmail.com",
                "password" => bcrypt('panca'),
                "phone" => "08123456789",
                "role_id" => 2,
            ],
            
            ]);
    }
}
