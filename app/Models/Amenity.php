<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    //Snippet per associare il model alla tabella db corrispondente vista l'irregolarità della parola
    protected $table = 'amenities';

    use HasFactory;
}
