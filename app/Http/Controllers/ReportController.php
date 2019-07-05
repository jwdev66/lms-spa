<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $this->dispatch(new \App\Jobs\CrunchReports($user));
    }

    public function show(Request $request)
    {
        $user = auth()->user();

        return URL::temporarySignedRoute(
            'unsubscribe',
            now()->addMinutes(30),
            ['user' => $user->id]
        );
    }
}
