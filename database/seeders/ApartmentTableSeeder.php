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
                'description' => "Caratteristico chalet Stay1 di 5 unità abitative indipendente. Immerso nella quiete dei pascoli a 1452 mt slm, 7 km dal comune di Mezzenile è posto su una terrazza panoramica. Ideale per chi desidera la tranquillità e il contatto con la natura. Una meta per ammirare il paesaggio, un punto di partenza per compiere escursioni in montagna.
                Adatto a 1 coppia o famiglia, max 5 persone.
                Massima tranquillità, solarium, barbecue.
                Ampio locale multifunzione per varie attività.",
                'rooms' => 8,
                'beds' => 3,
                'bathrooms' => 3,
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
                'description' => "Favolosa casa vacanze con piscina privata, arredata con gusto e situata sulle lussureggianti colline sopra Grasse. Una volta arrivati, è difficile non godere della fantastica vista sulle dolci colline e sul Mar Mediterraneo. La capitale del profumo Grasse, l'entroterra di Cannes e il Mar Mediterraneo non vi lasceranno di certo indifferenti. La casa è ideale per le famiglie.",
                'rooms' => 6,
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
