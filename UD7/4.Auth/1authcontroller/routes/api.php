<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//rutas para el AuthController, que hemos creado y no están protegidas por autenticación
Route::post('/create', [AuthController::class, 'store'])->name('create');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

//ruta para obtener un dato protegido, aprovechamos la de laravel.
//Esta ruta está protegida por el middleware auth:sanctum, por lo que
//solo se podrá acceder a ella si el usuario está autenticado mediante token  
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

