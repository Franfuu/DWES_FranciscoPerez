<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('admin.name')->get('/admin/ping', function () {
    return [
        'ok' => true,
        'message' => 'Bienvenido administrador',
        'status' => 'Acceso concedido',
        'timestamp' => now()->toDateTimeString(),
    ];
});
