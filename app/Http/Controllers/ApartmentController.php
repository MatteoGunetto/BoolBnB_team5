<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Amenity;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

//questo lo aggiungiamo per poter passare l'id dell utente loggato alla create
use Illuminate\Support\Facades\Auth;

//questo lo aggiungiamo per poter usare chiamate API

use Illuminate\Support\Facades\Http;


class ApartmentController extends Controller
{
    public function index()
    {

        $apartments = Apartment::all();

        return view('Apartment.index',compact('apartments'));

    }
    public function showOnlyYourApartments()
    {
        $user_id = Auth::id();
        $apartments = Apartment::where('user_id', $user_id)->get();

        return view('Apartment.myApartments', ['apartments' => $apartments]);

    }


    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        $amenities = $apartment->amenities; // Recupera i servizi collegati all'appartamento
        return view('Apartment.show', compact('apartment', 'amenities'));
    }

    public function create()
    {

        $apartments = Apartment::all();
        $amenities = Amenity::all();
        return view('Apartment.create',compact('apartments' , 'amenities') );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required|min:1',
            'rooms' => 'required|integer|numeric|min:1|max:500',
            'beds' => 'required|integer|numeric|min:1|max:500',
            'bathrooms' => 'required|integer|numeric|min:1|max:500',
            'squareMeters' => 'required|integer|numeric|min:1',
            'address' => 'required|min:1|max:255',
            //lat e lon non vanno validate perchè ci pensa direttamente Tomtom
            //'latitude' => 'required|numeric|between:-90,90',
            //'longitude' => 'required|numeric|between:-180,180',
            'image' => 'required|min:1',
            // questo nella fase di store non viene gestito dall'utente quindi non ha senso validarlo
            // 'visible' => 'required|integer|numeric',
        ]);

        // $apartment->messages()->attach($data['messages']);


        $data = $request->all();
        $data["user_id"] = Auth::id();

        $img_path=Storage::put("uploads",$data["image"]);
        $data["image"] = $img_path;

        // Chiamata tomtom per latitudine e longitudine
        $address = $data['address'];
        $apiKey = env('TOMTOM_API_KEY');
        $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";

        // la chiamata API la facciamo partire direttamente con la classe
        $response = Http::get($endpoint);

        //dd($response['results'][0]['position']);

        //vedere se si può scrivere meglio il "path" per position
        //position è un array associativo dentro alla response che ha 2 "proprietà" : "lat" e "lon" che andiamo a isolare nel passaggio dopo
        $position = $response['results'][0]['position'];

        //isoliamo "lat" e "lon" come variabili per poterle inserire nel database, cosa che facciamo nel passaggio subito dopo
        $latitude = $position["lat"];
        $longitude = $position["lon"];

        $data["latitude"] = $latitude;
        $data["longitude"] = $longitude;

        $apartment = Apartment::create($data);

        $apartment->amenities()->attach($data['amenities']);


        return redirect()->route('Apartment.index');
        //return redirect()->route('Apartments.show', $apartment->id);
    }

    public function edit($id)
    {
        // Cerca l'appartamento nel database con l'ID specificato
        $apartment = Apartment::findOrFail($id);
        // Recupera tutti i servizi dal database
        $amenities = $apartment->amenities;
         // Carica la vista 'edit' e passa il progetto, i tipi e le tecnologie alla vista
         return view('Apartment.edit', compact('apartment', 'amenities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required|min:1',
            'rooms' => 'required|integer|numeric|min:1|max:500',
            'beds' => 'required|integer|numeric|min:1|max:500',
            'bathrooms' => 'required|integer|numeric|min:1|max:500',
            'squareMeters' => 'required|integer|numeric|min:1',
            'address' => 'required|min:1|max:255',
            // 'latitude' => 'required|numeric|between:-90,90',
            // 'longitude' => 'required|numeric|between:-180,180',
            'image' => 'required|min:1|max:255',
            // 'visible' => 'required|integer|numeric',
        ]);
    }
    public function destroy(Request $request,$id) {

        $apartment = Apartment :: findOrFail($id);
        $apartment->amenities()->sync($request->input('amenities'));
        $apartment -> delete();

        return redirect() -> route('Apartment.myApartments');

    }

    public function myApartments() {
        return view('Apartment.myApartments');
    }


}
