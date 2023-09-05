<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    // Una promozione appartiene a più appartamenti.
    public function apartments() {
        return $this->belongsToMany(Apartment::class);
    }

}
