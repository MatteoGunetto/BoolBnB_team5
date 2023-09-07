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

    public function create()
    {
        $amenities = Amenity::all();
        return view('Apartment.create',compact('amenities') );
    }


    //Codice che ci serve per prendere i dati filtrati per id dal database

    // public function show($id)
    // {
    //     $apartment = Apartment::findOrFail($id);
    //     return view('Apartment.show', compact('apartment'));
    // }

    //Show provvisoria di sviluppo
    public function show()
    {
        return view('Apartment.show');
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

    public function edit()
    {
        return view('Apartment.edit');
    }


    // public function edit($id)
    // {
    //     // $apartment = Apartment::findOrFail($id);
    //     return view('apartments.edit', compact('apartment'));
    // }

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

    public function myApartments() {
        return view('Apartment.myApartments');
    }
}
