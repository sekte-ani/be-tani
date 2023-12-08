<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = User::findOrFail($id);
        return new UserResource($profile);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'born' => 'required'
        ]);

        $profile = User::findOrFail($id);
        $profile->update($request->all());
        return new UserResource($profile);
    }
}
