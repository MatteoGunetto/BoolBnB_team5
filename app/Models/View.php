<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

     // Un view può avere diversi appartamenti.
     public function apartments(){
        return $this->hasMany(Apartment::class);
    }
}
