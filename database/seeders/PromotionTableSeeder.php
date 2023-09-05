<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promotion;




class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // questa è la sintassi per usare faker, ma noi insieriamo a mano perchè ci servono "relazioni" tra campi / campi sensati tra loro
        //Promotion::factory()->count(3)->create();

        //questa è la sintassi per inserire manualmente dei dati
        Promotion::insert([
            [
                'title' => 'promozione corta',
                'cost' => 2.99,
                'durationInDays' => 1,
            ],
            [
                'title' => 'promozione media',
                'cost' => 4.99,
                'durationInDays' => 3,
            ],
            [
                'title' => 'promozione lunga',
                'cost' => 7.99,
                'durationInDays' => 6,
            ],
        ]);
    }

   
}
