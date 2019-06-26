<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;

class IdeaApproveController extends Controller
{
    public function index(Request $request)
    {
        $idea = Idea::findOrFail($request->id);
        event(new IdeaApproved($idea));

        return 'Apprved';
    }
}
