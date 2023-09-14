<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Amenity;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
//questo lo aggiungiamo per poter passare l'id dell utente loggato alla create
use Illuminate\Support\Facades\Auth;

//questo lo aggiungiamo per poter usare chiamate API

use Illuminate\Support\Facades\Http;

class ApartmentApiController extends Controller
{
    public function apartmentsIndex()
    {


        $apartments = Apartment::with('amenities')->get();
    

        return response()->json([
            'apartments' => $apartments
        ]);
    }

    public function apartmentsShow($id) {
        $apartment = Apartment::findOrFail($id);
        $apartment->load('amenities');

        return response()->json([
            'apartment' => $apartment
        ]);

    }

    public function getVueAddress(Request $request){
        $searchAddress = $request->query('searchAddress');

        return response()->json([
            'searchAddress' => $searchAddress
        ]);
    }

    public function filterApartments(Request $request){

        // Converti la stringa 'selectedAmenities' in un array
        $amenities = json_decode($request->selectedAmenities, true);

        // Costruisci la query
        $query = Apartment::query();

    

        if ($request->roomsNumber == 4) {
            $query->where('rooms', '>=', 4);
        } else {
            $query->where('rooms', $request->roomsNumber);
        }

        if ($request->bedsNumber == 4) {
            $query->where('beds', '>=', 4);
        } else {
            $query->where('beds', $request->bedsNumber);
        }

        if ($request->bathroomsNumber == 4) {
            $query->where('bathrooms', '>=', 4);
        } else {
            $query->where('bathrooms', $request->bathroomsNumber);
        }
           

        
        
        // Ottieni i risultati
        $apartments = $query->get();

        //manda i risultati
        return response()->json($apartments);

    }
}


        




    

