<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middleware global, se ejecuta durante cada solicitud.
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class, // Manejo de proxies
        \Illuminate\Http\Middleware\HandleCors::class, // CORS (Cross-Origin Resource Sharing)
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // Prevenir solicitudes durante mantenimiento
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Validación del tamaño de los POST
        \App\Http\Middleware\TrimStrings::class, // Eliminación de espacios innecesarios en los strings
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Convertir cadenas vacías a null
    ];

    // Definición de grupos de middleware para diferentes tipos de rutas (web/api)
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Cifrado de cookies
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Agregar cookies a la respuesta
            \Illuminate\Session\Middleware\StartSession::class, // Iniciar sesión para la web
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Compartir errores con las vistas
            \App\Http\Middleware\VerifyCsrfToken::class, // Verificación CSRF para la protección de formularios web
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Resolución de dependencias en rutas
        ],

        // Middleware específico para la API
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,  // Si usas Sanctum para autenticación con frontend
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api', // Limitar el número de solicitudes por unidad de tiempo
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Resolución de dependencias en rutas API
        ],
    ];

    // Alias de middleware que puedes usar para asignar a rutas de forma sencilla
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Middleware de autenticación
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, // Autenticación básica
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class, // Autenticación basada en sesión
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class, // Control de encabezados de caché
        'can' => \Illuminate\Auth\Middleware\Authorize::class, // Middleware para verificar permisos
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Redirige a los usuarios autenticados fuera de ciertas rutas
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // Requiere confirmación de contraseña
        'signed' => \App\Http\Middleware\ValidateSignature::class, // Middleware para URLs firmadas
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Limita las solicitudes para evitar abusos
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Asegura que el correo electrónico esté verificado
    ];
}
