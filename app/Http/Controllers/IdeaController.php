<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaForm;
use App\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::all();

        return view('idea.index')->with('ideas', $ideas);
    }

    public function create()
    {
        //
    }

    public function store(IdeaForm $request)
    {
        $dataValidated = $request->validated();
        $dataValidated['user_id'] = auth()->id();

        $idea = Idea::create($dataValidated);

        return redirect(route('ideas.index'))->with('success', 'Idea created successfully.');
    }

    public function show(Idea $idea)
    {
        return view('idea.show')->with('idea', $idea);
    }

    public function edit(Idea $idea)
    {
        //
    }

    public function update(Request $request, Idea $idea)
    {
        //
    }

    public function destroy(Idea $idea)
    {
        //
    }
}
