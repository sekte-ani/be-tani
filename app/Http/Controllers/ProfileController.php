<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'born' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return new UserResource($user);
    }
}
