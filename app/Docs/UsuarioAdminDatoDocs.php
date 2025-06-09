<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Usuarios Admin Datos",
 *     description="Gestión de datos administrativos de usuarios"
 * )
 */
class UsuarioAdminDatoDocs
{
    /**
     * @OA\Get(
     *     path="/api/usuarios-admin-datos",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Listar todos los datos admin",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Lista de datos admin")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/usuarios-admin-datos",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Crear un nuevo dato admin",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"usuario_id"},
     *             @OA\Property(property="usuario_id", type="integer", example=5),
     *             @OA\Property(property="imagen", type="string", example="avatar.png"),
     *             @OA\Property(property="ultima_ip", type="string", example="192.168.1.1"),
     *             @OA\Property(property="es_super", type="boolean", example=true),
     *             @OA\Property(property="token", type="string", example="abc123")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Dato admin creado")
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/usuarios-admin-datos/{id}",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Ver un dato admin específico",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Dato admin encontrado"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/usuarios-admin-datos/{id}",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Actualizar un dato admin",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="imagen", type="string", example="nueva_imagen.png"),
     *             @OA\Property(property="ultima_ip", type="string", example="10.0.0.2"),
     *             @OA\Property(property="es_super", type="boolean", example=false),
     *             @OA\Property(property="token", type="string", example="xyz789")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Dato admin actualizado"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/usuarios-admin-datos/{id}",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Eliminar (soft delete) un dato admin",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Dato admin eliminado"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function destroy() {}

    /**
     * @OA\Get(
     *     path="/api/usuarios-admin-datos-eliminados",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Listar datos admin eliminados",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Lista de eliminados")
     * )
     */
    public function eliminados() {}

    /**
     * @OA\Put(
     *     path="/api/usuarios-admin-datos-restaurar/{id}",
     *     tags={"Usuarios Admin Datos"},
     *     summary="Restaurar un dato admin eliminado",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Dato restaurado"),
     *     @OA\Response(response=404, description="No encontrado o no eliminado")
     * )
     */
    public function restore() {}
}
