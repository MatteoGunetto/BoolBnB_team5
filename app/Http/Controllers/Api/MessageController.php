<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;


class MessageController extends Controller
{
    public function messagesIndex (Request $request)
    {
        // Validazione dei dati inviati dal form (esempio: nome_utente e testo_messaggio)
        $request->validate([
            'SenderEmail' => 'required|min:1|max:255',
            'Name' => 'required|min:1',
            'Content' => 'required|min:1|max:500',
        ]);

        // Creazione di un nuovo messaggio utilizzando il modello Message
        $messages = Message::create([
            'SenderEmail' => $request->input('SenderEmail'),
            'Name' => $request->input('Name'),
            'Content' => $request->input('Content'),
        ]);

        // Restituisci una risposta con il messaggio creato
        return response()->json(['message' => 'Messaggio salvato con successo', 'message_data' => $messages], 201);
    }
}
