<?php

namespace App\Docs;

/**
 * @OA\Info(
 *     title="API APR",
 *     version="1.0.0",
 *     description="Documentación de la API del sistema de Agua Potable Rural"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     in="header",
 *     name="Authorization",
 *     description="Autenticación usando token Bearer"
 * )
 */
class AuthDocs
{
    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Autenticación"},
     *     summary="Iniciar sesión",
     *     description="Permite iniciar sesión con email y contraseña. Devuelve un token Bearer para autenticación.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="luciano@example.com"),
     *             @OA\Property(property="password", type="string", example="12345678")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inicio de sesión exitoso",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object"),
     *             @OA\Property(property="token", type="string", example="1|eyJ0eXAiOiJKV...")
     *         )
     *     ),
     *     @OA\Response(response=401, description="Credenciales incorrectas")
     * )
     */
    public function loginDoc() {}

    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Autenticación"},
     *     summary="Registrar nuevo usuario",
     *     description="Crea un nuevo usuario y devuelve su token de acceso.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"run", "nombre_usuario", "nombre", "apellido", "email", "password", "password_confirmation"},
     *             @OA\Property(property="run", type="string", example="12345678-9"),
     *             @OA\Property(property="nombre_usuario", type="string", example="luciano.dev"),
     *             @OA\Property(property="nombre", type="string", example="Luciano"),
     *             @OA\Property(property="apellido", type="string", example="Andrade"),
     *             @OA\Property(property="email", type="string", example="luciano@example.com"),
     *             @OA\Property(property="telefono_movil", type="string", example="+56912345678"),
     *             @OA\Property(property="password", type="string", example="12345678"),
     *             @OA\Property(property="password_confirmation", type="string", example="12345678")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuario registrado exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object"),
     *             @OA\Property(property="token", type="string", example="1|abc123...")
     *         )
     *     ),
     *     @OA\Response(response=422, description="Error de validación")
     * )
     */
    public function registerDoc() {}

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"Autenticación"},
     *     summary="Cerrar sesión",
     *     description="Cierra la sesión actual eliminando el token.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Sesión cerrada correctamente"),
     *     @OA\Response(response=401, description="No autenticado")
     * )
     */
    public function logoutDoc() {}

    /**
     * @OA\Get(
     *     path="/api/me",
     *     tags={"Autenticación"},
     *     summary="Obtener usuario autenticado",
     *     description="Devuelve los datos del usuario autenticado usando Sanctum.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Usuario autenticado",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="nombre", type="string", example="Luciano"),
     *             @OA\Property(property="apellido", type="string", example="Andrade"),
     *             @OA\Property(property="email", type="string", example="luciano@example.com"),
     *             @OA\Property(property="telefono_movil", type="string", example="+56912345678")
     *         )
     *     ),
     *     @OA\Response(response=401, description="No autenticado")
     * )
     */
    public function meDoc() {}
}
