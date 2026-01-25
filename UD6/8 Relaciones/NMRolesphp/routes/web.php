<?php

use Illuminate\Support\Facades\Route;


Route::get('/players', [App\Http\Controllers\PlayerController::class, 'index'])->name('players.index');
