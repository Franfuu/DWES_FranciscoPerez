<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});
Route::get('/welcome', function () {
    return view('welcome');
});

