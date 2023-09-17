<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;


class MessageApiController extends Controller
{
    public function messagesIndex(Request $request)
    {
        // Ottieni i dati inviati dalla richiesta
        $data = $request->all();

        // Crea un nuovo messaggio con i dati ricevuti
        $message = Message::create($data);

        return response()->json([
            "status" => 'success',
            "data" => $message,  // Restituisci il messaggio creato come parte della risposta
        ]);
    }
}

