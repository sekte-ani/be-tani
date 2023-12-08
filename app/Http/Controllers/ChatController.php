<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Resources\ChatResource;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user = auth()->id();
        $chat = Message::where('user_id', $user)->get();
        return ChatResource::collection($chat);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $request['user_id'] = Auth::user()->id;
        $note = Message::create($request->all());
        return new ChatResource($note);
    }
}
