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
        $file = $request->file('document');
        $fileName = date('u') . '-' . $file->getClientOriginalName();

        try {
            $file->storeAs('public/documents', $fileName);
        } catch (\Exception $e) {
            return back()->with('error', 'Document not uploaded');
        }

        $data = $request->only('title');
        $data['file'] = $fileName;
        Document::create($data);

        return back()->with('success', 'Document successfully added');
    }


    public function show(Document $document)
    {
        // Download a file
        // return response()->download($pathToFile);
        // return response()->download($pathToFile, $name, $headers);
        // return response()->download($pathToFile)->deleteFileAfterSend(true);

        // Open a file
        // return response()->file($pathToFile);
    // return response()->file($pathToFile, $headers);
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
