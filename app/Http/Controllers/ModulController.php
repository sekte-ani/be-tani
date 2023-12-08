<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Resources\DocumentResource;

class ModulController extends Controller
{
    public function index()
    {
        $doc = Document::all();
        return DocumentResource::collection($doc);
    }

    public function show($id)
    {
        $doc = Document::findOrFail($id);
        return new DocumentResource($doc);
    }
}
