<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        return view('message.index', [
            'message' => Message::orderBy('status', 'ASC')->latest()->filter(request(['user']))->paginate(5)->withQueryString()
        ]);
    }

    public function readMessage(Message $message){
        Message::where('id', $message->id)->update(array('status' => '1'));

        return view('message.show', [
            'message' => $message
        ]);
    }

    
}
