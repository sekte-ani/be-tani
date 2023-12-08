<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserChat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = auth()->user();
        $chat = Message::findOrFail($request->id);
        
        if ( $chat->user_id != $currentUser->id ) {
            return response()->json(['message' => 'data tidak ditemukan']); 
        }

        return $next($request);
    }
}
