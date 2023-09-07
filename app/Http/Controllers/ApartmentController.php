<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Amenity;
use Illuminate\Support\Facades\Storage;

//questo lo aggiungiamo per poter passare l'id dell utente loggato alla create
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();

        return view('Apartment.index',compact('apartments'));

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
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'image' => 'required|min:1|max:255',
            // 'visible' => 'required|integer|numeric',
        ]);

        $data = $request->all();
        $data["user_id"] = Auth::id();

        $img_path=Storage::put("uploads",$data["image"]);
        $data["image"] = $img_path;

        $apartment = Apartment::create($data);

        $apartment->amenities()->attach($data['amenities']);

        return redirect()->route('Apartment.index');
        //return redirect()->route('Apartments.show', $apartment->id);
    }

    public function edit()
    {
        // Cerca l'appartamento nel database con l'ID specificato
        $apartment = Apartment::findOrFail($id);
        // Recupera tutti i servizi dal database
        $amenities = Amenity::all();
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
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'image' => 'required|min:1|max:255',
            // 'visible' => 'required|integer|numeric',
        ]);
    }

    public function myApartments() {
        return view('Apartment.myApartments');
    }
}
