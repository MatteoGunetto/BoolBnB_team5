<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;

class Apartment extends Model
{
    use HasFactory;
    // Un appartamento può avere diversi servizi.
    public function amenities() {
        return $this->belongsToMany(Amenity::class,'amenity_apartment');
    }

    // Un determinato appartamento è posseduto da un solo utente.
    public function user() {

        return $this -> belongsTo(User::class);
    }
    // Un appartamento può avere diverse promozioni.
    public function promotions() {
        return $this->belongsToMany(Promotion::class)
        ->withPivot('startDate')
        ->withTimestamps();
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
        'visible',
        'user_id',
    ];

    public function hasActivePromotion()
    {
        // Recupera tutte le promozioni associate a questo appartamento
        $promotions = $this->promotions;

        // Ora, verifica se c'è almeno una promozione attiva tra quelle associate
        foreach ($promotions as $promotion) {
            $startDate = Carbon::parse($promotion->pivot->startDate);
            $endDate = $startDate->copy()->addDays($promotion->durationInDays);

            // Verifica se la data corrente è compresa tra startDate e endDate
            if (now()->between($startDate, $endDate)) {
                return true;
            }
        }

        // Se non ci sono promozioni attive, restituisci false
        return false;
    }
}
