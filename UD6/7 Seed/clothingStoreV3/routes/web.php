<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClothingItemController;

Route::get('/', function () {
    return view('home'); // simple home with menu
});

Route::resource('users', UserController::class);
Route::resource('clothing-items', ClothingItemController::class);