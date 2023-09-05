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
                'icon' => '<i class="fa-solid fa-wifi"></i>',
            ],
            [
                'name' => 'Parking',
                'icon' => '<i class="fa-solid fa-square-parking"></i>',
            ],
            [
                'name' => 'Swimming Pool',
                'icon' => '<i class="fa-solid fa-person-swimming"></i>',
            ],
            [
                'name' => 'Concierge',
                'icon' => '<i class="fa-solid fa-bell-concierge"></i>',
            ],
            [
                'name' => 'Sauna',
                'icon' => '<i class="fa-solid fa-spa"></i>',
            ],
            [
                'name' => 'Sea View',
                'icon' => '<i class="fa-solid fa-water"></i>',
            ],
        ]);
    }
}
