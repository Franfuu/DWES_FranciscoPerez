<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserNameIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Opción 1 (súper simple): user=admin (en el body)
        // $user = $request->input('user');

        // Si prefieres permitir también header o body, puedes descomentar:
        $user = $request->query('user')
            ?? $request->header('X-User')
            ?? $request->input('user');

        if ($user !== 'admin') {
            return response()->json([
                'error' => 'Acceso denegado',
                'message' => 'Solo los administradores pueden acceder a este recurso',
                'required_user' => 'admin',
                'received_user' => $user ?? 'ninguno',
            ], 403);
        }

        return $next($request);
    }
}
