<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Authenticate extends Middleware
{
    /**
     * Handle unauthenticated users.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            // Devuelve null aquí para que Laravel NO redirija.
            return null;
        }

        // Solo si fuera una aplicación web tradicional
        return route('login');
    }

    /**
     * Override el método unauthenticated() para APIs.
     */
    protected function unauthenticated($request, array $guards)
    {
        abort(response()->json([
            'message' => 'No autenticado. Por favor, inicia sesión.'
        ], 401));
    }
}
