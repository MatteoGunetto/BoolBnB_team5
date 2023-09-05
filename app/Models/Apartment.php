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

    public function promotions() {
        return $this->belongsToMany(Promotion::class);
    }
}
