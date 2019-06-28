<?php

namespace App\Http\Controllers;

use App\Events\IdeaApproved;
use App\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IdeaApproveController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $idea = Idea::findOrFail(2);

        event(new IdeaApproved($user, $idea));
        Log::info('Event called');

        return 'Idea 2 Approved';
    }

}
