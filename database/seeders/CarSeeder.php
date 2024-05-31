<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::insert([
            [
                "name" => 'Expander',
                "image" => 'https://imgcdnblog.carbay.com/wp-content/uploads/2017/07/25073245/Mitsubishi-Next-Generation-MPV-Intro-9-002.jpg',
                "year" => 2024,
                "price" => 200000000,
                "description" => 'new car.'
            ],
            [
                "name" => 'Pajero',
                "image" => 'https://imgx.gridoto.com/crop/0x0:0x0/700x465/photo/2024/03/20/mitsubishi-pajero-sport-facelift-20240320115348.jpg',
                "year" => 2024,
                "price" => 400000000,
                "description" => 'new car.'
            ],
            ]);
    }
}
