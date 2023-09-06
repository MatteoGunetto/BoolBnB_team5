<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        return view('apartment.index');
        compact('Apartment');
    }

    public function create()
    {
        return view('apartment.create');
        compact('Apartment');
    }


    public function show()
    {
        return view('apartment.show');
        compact('Apartment');
    }

    public function update()
    {
        return view('apartment.update');
        compact('Apartment');
    }

    public function edit()
    {
        return view('apartment.edit');
        compact('Apartment');
    }

    public function store()
    {
        return view('apartment.store');
        compact('Apartment');
    }
}
