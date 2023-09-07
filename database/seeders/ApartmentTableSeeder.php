<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apartment::insert([
            [
                'title' => 'Villa Boolean',
                'description' => "Villa nel centro di Roma",
                'rooms' => 10,
                'beds' => 20,
                'bathrooms' => 15,
                'squareMeters' => 800,
                'address' => "Via Giulia 40",
                'latitude' => 41.894322,
                'longitude' =>12.469893,
                'image' => "",
                'visible' => 1,
                'user_id' => 8,
            ],
            [
                'title' => 'Appartamento Boolean',
                'description' => "Appartamento nel centro di Milano",
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 2,
                'squareMeters' => 120,
                'address' => "Via Mercanti 12",
                'latitude' => 45.275570,
                'longitude' =>12.111361,
                'image' => "",
                'visible' => 1,
                'user_id' => 8,
            ],
        ]);
    }
}