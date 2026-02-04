<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::resource('city', CityController::class);
