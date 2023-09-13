<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenityTableSeeder extends Seeder
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
                'icon' => 'fa-wifi',
            ],
            [
                'name' => 'Parking',
                'icon' => 'fa-square-parking',
            ],
            [
                'name' => 'Swimming Pool',
                'icon' => 'fa-person-swimming',
            ],
            [
                'name' => 'Concierge',
                'icon' => 'fa-bell-concierge',
            ],
            [
                'name' => 'Sauna',
                'icon' => 'fa-spa',
            ],
            [
                'name' => 'Sea View',
                'icon' => 'fa-water',
            ],
        ]);
    }
}
