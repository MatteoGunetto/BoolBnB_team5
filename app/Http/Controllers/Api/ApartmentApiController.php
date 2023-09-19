<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

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


        $apartments = Apartment::with('messages')->get();


        return response()->json([
            'apartments' => $apartments
        ]);
    }

    public function apartmentsShow($id)
    {
        // $apartment = Apartment::findOrFail($id);

        //mi passo anche i dati dell'utente associato, ma mi passo solo il name per non esporre mail e password
        $apartment = Apartment::with(['user' => function ($query) {
            $query->select('id', 'name'); // Specifica le colonne che desideri caricare
        }])->findOrFail($id);
        $apartment->load('amenities');

        return response()->json([
            'apartment' => $apartment
        ]);
    }

    public function getVueAddress(Request $request)
    {
        $searchAddress = $request->query('searchAddress');

        return response()->json([
            'searchAddress' => $searchAddress
        ]);
    }

    public function filterApartments(Request $request)
    {

        // Converti la stringa 'selectedAmenities' in un array
        $amenityIds = json_decode($request->selectedAmenities, true);

        $maxDistanceSelected = $request->selectedDistance;
        // Costruisci la query
        $query = Apartment::query(); // Qui chiamiamo il model di Apartment (che ci serve anche per stampare quelli con promotions, utilizzando end date e start date)

        // Filtri per numero di stanze, letti e bagni
        if (isset($request->roomsNumber)) {
            if ($request->roomsNumber == 4) {
                $query->where('rooms', '>=', 4);
            } else {
                $query->where('rooms', $request->roomsNumber);
            }
        }

        if (isset($request->bedsNumber)) {
            if ($request->bedsNumber == 4) {
                $query->where('beds', '>=', 4);
            } else {
                $query->where('beds', $request->bedsNumber);
            }
        }

        if (isset($request->bathroomsNumber)) {
            if ($request->bathroomsNumber == 4) {
                $query->where('bathrooms', '>=', 4);
            } else {
                $query->where('bathrooms', $request->bathroomsNumber);
            }
        }


        $address = $request->addressInAdvancedSearch;
        $apiKey = env('TOMTOM_API_KEY');
        $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";
        $response = Http::get($endpoint);

        $lat = $response->json()["results"][0]["position"]["lat"];
        $lon = $response->json()["results"][0]["position"]["lon"];

        $distance = $maxDistanceSelected;
        $query->select(DB::raw("*, ST_Distance_Sphere(POINT(longitude, latitude), POINT($lon, $lat)) / 1000 AS distance"))
            ->whereRaw('ST_Distance_Sphere(POINT(longitude, latitude), POINT(?, ?)) < ?', [$lon, $lat, $distance * 1000])
            ->orderBy('distance');

        // Filtro per le amenities
        if (!empty($amenityIds)) {
            foreach ($amenityIds as $id) {
                $query->whereHas('amenities', function ($q) use ($id) {
                    $q->where('amenities.id', $id);
                });
            }
        }

        // Ottieni i risultati e dammi anche le associazioni con amenities e con le promotions
        $apartments = $query->with('amenities')->with('promotions')->get();

        // Manda i risultati
        return response()->json($apartments);
    }

    public function promoApartmentsForHome()
    {

        $sponsoredApartments = Apartment::has('promotions')->get();


        return response()->json($sponsoredApartments);
    }
}
