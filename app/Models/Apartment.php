<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    // Un appartamento può avere diversi servizi.
    public function amenities() {
        return $this->belongsToMany(Amenity::class);
    }

    // Un determinato appartamento è posseduto da un solo utente.
    public function user() {

        return $this -> belongsTo(User::class);
    }
    // Un appartamento può avere diverse promozioni.
    public function promotions() {
        return $this->belongsToMany(Promotion::class);
    }

      // Un determinato appartamento ha una sola view.
      public function view() {

        return $this -> belongsTo(View::class);
    }

     // Un appartamento può avere diversi messaggi.
     public function messages(){
        return $this->hasMany(Message::class);
    }

    protected $fillable = [
        'title',
        'description',
        'rooms',
        'beds',
        'bathrooms',
        'squareMeters',
        'address',
        'latitude',
        'longitude',
        'image',
        'description',
        'icon',
    ];
}
