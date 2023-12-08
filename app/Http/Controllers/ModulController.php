<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Resources\ModulResource;

class ModulController extends Controller
{
    public function index()
    {
        $doc = Document::all();
        return ModulResource::collection($doc);
    }

    public function show($id)
    {
        $doc = Document::findOrFail($id);
        return new ModulResource($doc);
    }
}
