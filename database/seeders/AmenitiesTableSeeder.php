<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // questa è la sintassi per usare faker, ma noi insieriamo a mano perchè ci servono "relazioni" tra campi / campi sensati tra loro
        //Amenity::factory()->count(3)->create();

        //questa è la sintassi per inserire manualmente dei dati
        Amenity::insert([
            [
                'name' => 'Wifi',
                'icon' => "",
            ],
            [
                'name' => 'Parking',
                'icon' => "",
            ],
            [
                'name' => 'Swimming Pool',
                'icon' => "",
            ],
            [
                'name' => 'Concierge',
                'icon' => "",
            ],
            [
                'name' => 'Sauna',
                'icon' => "",
            ],
            [
                'name' => 'Sea View',
                'icon' => "",
            ],
        ]);
    }
}
