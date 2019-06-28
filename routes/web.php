<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Dispatch Job
Route::get('/report', 'ReportController@index')->name('makeReport');

// IDea Submit event
Route::get('/submit/{id}', 'SubmitController@store')->name('submitIdea');

Route::resource('/documents', 'DocumentController');


Route::resource('/ideas', 'IdeaController');


Route::get('/approve', 'IdeaApproveController@index')->name('approve');
