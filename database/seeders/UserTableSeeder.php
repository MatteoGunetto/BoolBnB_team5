<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

//aggiunto per poter hashare la password, altrimenti non riesco a fare login con gli utenti che creo con il seeder, si vede che prova a decriptare la password non criptata e non c'è il match
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // questa è la sintassi per usare faker, ma noi insieriamo a mano
        //User::factory()->count(10)->create();

        User::insert([
            [
                'email' => "andrea@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Andrea",
                'surname' => "Cecchi",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "arianna@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Arianna",
                'surname' => "Ruggirello",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "alessandro@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Alessandro",
                'surname' => "Franco",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "matteo@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Matteo",
                'surname' => "Gunetto",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "antonio@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Antonio",
                'surname' => "Boksic",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "luca@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Luca",
                'surname' => "Formicola",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "jacopo@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Jacopo",
                'surname' => "Damiani",
                'dateOfBirth' => "1990-01-01"
            ],
            [
                'email' => "mauro@gmail.com",
                'password' => Hash::make("12345"),
                'name' => "Mauro",
                'surname' => "Formisano",
                'dateOfBirth' => "1990-01-01"
            ],
           
        ]);
    }
}
