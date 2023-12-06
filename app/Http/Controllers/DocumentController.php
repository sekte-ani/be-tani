<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modul.index', [
            'data' => Document::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'modul' => 'required|max:20480|file|mimes:pdf,doc,docx,ppt,pptx,png,jpeg',
        ]);

        if($request->file('modul')){
            $validatedData['modul'] = $request->file('modul')->store('post-file');
        }


        Document::create($validatedData);

        return redirect('/modul')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Detail Data',
        //     'data'    => $document 
        // ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $document = Document::findOrFail($id);
        return view('modul.modal.edit' ,compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:255',
            'modul' => 'max:20480|file|mimes:pdf,doc,docx,ppt,pptx,png,jpeg',
        ];

        
        $document =  Document::findOrFail($id);
        $validatedData = $request->validate($rules);
        
        if($request->file('modul')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['modul'] = $request->file('modul')->store('post-file');
        }
        
        $document->update($validatedData);
       

        // Document::where('id', $document->id)
        //     ->update($validatedData);

        return redirect('modul')->with('success', "Post has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);
        if($document->modul) {
            Storage::delete($document->modul);
        }

        $document->delete();
        return  redirect('modul')->with('success', 'Post has been deleted!');
    }
}
