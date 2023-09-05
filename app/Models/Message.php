<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'name',
        'senderEmail'
    ];

      // Un determinato messaggio è contenuto in un solo appartamento.
      public function apartment() {

        return $this -> belongsTo(Apartment::class);
    }
}
