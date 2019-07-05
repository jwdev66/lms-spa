<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Idea;

class IdeaController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? 15;
        return Idea::paginate($limit);
    }

    public function store(Request $request)
    {
        $data = $request->only('title','description');
        $data['user_id'] = auth()->user()->id;
        $idea = Idea::create($data);

        return $idea;

    }

    public function show($id)
    {
        return Idea::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('title','description');
        $data['user_id'] = auth()->user()->id;
        $idea = Idea::update($data);

        return $idea;
    }

    public function destroy($id)
    {
        $idea  = Idea::findOrFail($id);
        $idea->delete();
        return '';
    }
}
