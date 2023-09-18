<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;

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
    // public function showOnlyYourMessages() {
    //     return view('Apartment.myMessages');
    // }
    public function showOnlyYourMessages()
    {
        $messages = message::all();
        return view('Apartment.myMessages', ['messages' => $messages]);
    }

    // public function show($id)
    // {
    //     // $apartment = Apartment::findOrFail($id);
    //     // $amenities = $messages->amenities; // Recupera i servizi collegati all'appartamento
    //     // return view('Apartment.show', compact('apartment', 'amenities'));
    // }
}
