<?php

namespace App\Http\Controllers;

use App\Events\IdeaSubmitted;
use App\Idea;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function store(Request $request)
    {
        $idea = Idea::findOrFail($request->id);
        $user = auth()->user();

        event(new IdeaSubmitted($user, $idea));

        return 'Idea '.$idea->description.'submitted!!';
    }
}
