<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartment = Apartment::all();
        return view('apartment.index',compact('Apartments'));
    }

    public function create()
    {
        return view('Apartment.create');
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
            'visible' => 'required|integer|numeric',
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
            'visible' => 'required|integer|numeric',
        ]);

        $apartment = Apartment::create($request);
        return redirect()->route('apartments.show', $apartment->id);
    }
}
