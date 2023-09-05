<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public function amenities() {
        return $this->belongsToMany(Amenity::class);
    }

    // Un determinato appartamento è posseduto da un solo utente.
    public function user() {

        return $this -> belongsTo(User :: class);
    }

}
