<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;


class MessageController extends Controller
{
    public function messagesIndex()
    {
        $messages = Message::all();

        return $messages
    ;
    }
}
