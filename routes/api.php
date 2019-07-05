<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Idea;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('ideas', 'API\IdeaController');
