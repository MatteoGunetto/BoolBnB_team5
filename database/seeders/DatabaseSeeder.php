<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ApartmentTableSeeder::class,
            UserTableSeeder :: class ,
            PromotionTableSeeder :: class ,
            AmenityTableSeeder :: class ,
            ApartmentTableSeeder :: class ,
        ]);
    }




}
