<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index()
    {
        $documents = Document::all();
        return view('documents.index')->with('documents', $documents);

    }


    public function store(Request $request)
    {

        $document = new Document;

        $file = $request->file('document');
        $fileName = date('u') . '-' . $file->getClientOriginalName();

        try {
            $file->storeAs('public/documents', $fileName);
        } catch (\Exception $e) {
            return back()->with('error', 'Document not uploaded');
        }
        $document->title = $request->title;
        $document->file = $fileName;
        $document->save();

        // Call Event

        return back()->with('success', 'Document successfully added');
    }


    public function show(Document $document)
    {
        //
    }


    public function update(Request $request, Document $document)
    {
        //
    }


    public function destroy(Document $document)
    {
        //
    }
}
