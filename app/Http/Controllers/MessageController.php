<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;

class MessageController extends Controller
{
    public function store(Request $request, $apartmentIdInUrl) {


        //validazioni da sistemare 
        $request->validate([
            'SenderEmail' => 'required|min:1|max:255',
            'Name' => 'required|min:1',
            'Content' => 'required|min:1|max:500',
        ]);

        $data = $request->all();

        $apartment_id = $apartmentIdInUrl;

        $data["apartment_id"] = $apartment_id;

 
        Message::create($data);

        return redirect()->route('Apartment.index');
        //return redirect()->route('Apartments.show', $apartment->id);
    }
}
