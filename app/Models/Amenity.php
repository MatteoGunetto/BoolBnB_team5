<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    //Snippet per associare il model alla tabella db corrispondente vista l'irregolarità della parola
    protected $table = 'amenities';

    // Un servizio appartiene a più appartamenti.
    public function apartments() {
        return $this->belongsToMany(Apartment::class, 'amenity_apartment');
    }

    protected $fillable = [
        'name',
        'icon',
    ];

    use HasFactory;
}
