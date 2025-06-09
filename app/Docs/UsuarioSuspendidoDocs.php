<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Usuarios Suspendidos",
 *     description="Gestión de suspensiones de usuarios"
 * )
 */
class UsuarioSuspendidoDocs
{
    /**
     * @OA\Get(
     *     path="/api/usuarios-suspendidos",
     *     tags={"Usuarios Suspendidos"},
     *     summary="Listar suspensiones",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de suspensiones",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/usuarios-suspendidos",
     *     tags={"Usuarios Suspendidos"},
     *     summary="Crear una nueva suspensión de usuario",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"usuario_id", "estado"},
     *             @OA\Property(property="usuario_id", type="integer", example=3),
     *             @OA\Property(property="estado", type="integer", example=1, description="1: Suspendido, 2: Por Reponer, 3: Repuesto"),
     *             @OA\Property(property="fecha_suspension", type="string", format="date", example="2025-06-08")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Suspensión creada exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=12),
     *             @OA\Property(property="usuario_id", type="integer", example=3),
     *             @OA\Property(property="estado", type="integer", example=1),
     *             @OA\Property(property="fecha_suspension", type="string", format="date", example="2025-06-08"),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2025-06-09T04:00:00Z"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2025-06-09T04:00:00Z")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación (por ejemplo: usuario no existe)",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="El usuario especificado no existe en el sistema."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(
     *                     property="usuario_id",
     *                     type="array",
     *                     @OA\Items(type="string", example="El usuario especificado no existe en el sistema.")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="No autorizado - Token no válido o ausente"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/usuarios-suspendidos/{id}",
     *     tags={"Usuarios Suspendidos"},
     *     summary="Ver detalle de una suspensión",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detalle de suspensión"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/usuarios-suspendidos/{id}",
     *     tags={"Usuarios Suspendidos"},
     *     summary="Actualizar una suspensión",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="fecha_suspension", type="string", format="date", example="2025-06-20"),
     *             @OA\Property(property="estado", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Suspensión actualizada"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function update() {}


    /**
     * @OA\Delete(
     *     path="/api/usuarios-suspendidos/{id}",
     *     tags={"Usuarios Suspendidos"},
     *     summary="Eliminar suspensión (soft delete)",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Suspensión eliminada"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function destroy() {}

    /**
     * @OA\Get(
     *     path="/api/usuarios-suspendidos-eliminados",
     *     tags={"Usuarios Suspendidos"},
     *     summary="Listar usuarios suspendidos eliminados (soft deleted)",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de suspensiones eliminadas",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     ),
     *     @OA\Response(response=403, description="No autorizado")
     * )
     */
    public function eliminados() {}

    /**
    * @OA\Put(
    *     path="/api/usuarios-suspendidos-restaurar/{id}",
    *     tags={"Usuarios Suspendidos"},
    *     summary="Restaurar un usuario suspendido eliminado",
    *     security={{"sanctum":{}}},
    *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         description="ID del registro eliminado",
    *         @OA\Schema(type="integer")
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Usuario suspendido restaurado",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Usuario suspendido restaurado"),
    *             @OA\Property(property="data", type="object")
    *         )
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No encontrado o no eliminado"
    *     ),
    *     @OA\Response(response=403, description="No autorizado")
    * )
    */
    public function restore() {}


}
