<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;


class MessageApiController extends Controller
{
    public function messagesIndex(Request $request)
    {
        $messages = Message::all();
        // dd($request->all());
        $response = Message::create($messages);

        return response()-> json([
            "status" => 'success',
            "data" => $response,
        ])
    ;
    }
}
