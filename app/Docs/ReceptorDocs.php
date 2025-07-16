<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Receptores",
 *     description="Operaciones relacionadas con los receptores de usuarios"
 * )
 */
class ReceptorDocs
{
    /**
     * @OA\Get(
     *     path="/api/receptores",
     *     tags={"Receptores"},
     *     summary="Listar todos los receptores",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de receptores",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarReceptoresDoc() {}

    /**
     * @OA\Post(
     *     path="/api/receptores",
     *     tags={"Receptores"},
     *     summary="Registrar un nuevo receptor",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"run", "razon_social", "actividad_comercial", "direccion", "comuna_id", "usuario_id"},
     *             @OA\Property(property="run", type="string", example="12345678-9"),
     *             @OA\Property(property="razon_social", type="string", example="Receptor S.A."),
     *             @OA\Property(property="actividad_comercial", type="string", example="Servicios de Agua"),
     *             @OA\Property(property="direccion", type="string", example="Av. Principal 1234"),
     *             @OA\Property(property="comuna_id", type="integer", example=1),
     *             @OA\Property(property="usuario_id", type="integer", example=3)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Receptor creado correctamente"
     *     )
     * )
     */
    public function crearReceptorDoc() {}

    /**
     * @OA\Get(
     *     path="/api/receptores/{id}",
     *     tags={"Receptores"},
     *     summary="Obtener un receptor por ID",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del receptor"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Receptor no encontrado"
     *     )
     * )
     */
    public function obtenerReceptorPorIdDoc() {}

    /**
     * @OA\Put(
     *     path="/api/receptores/{id}",
     *     tags={"Receptores"},
     *     summary="Actualizar un receptor",
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
     *             @OA\Property(property="run", type="string", example="12345678-9"),
     *             @OA\Property(property="razon_social", type="string", example="Receptor S.A."),
     *             @OA\Property(property="actividad_comercial", type="string", example="Servicios"),
     *             @OA\Property(property="direccion", type="string", example="Calle Falsa 123"),
     *             @OA\Property(property="comuna_id", type="integer", example=5),
     *             @OA\Property(property="usuario_id", type="integer", example=3)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Receptor actualizado correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Receptor no encontrado"
     *     )
     * )
     */
    public function actualizarReceptorDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/receptores/{id}",
     *     tags={"Receptores"},
     *     summary="Eliminar un receptor (soft delete)",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Receptor eliminado correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Receptor no encontrado"
     *     )
     * )
     */
    public function eliminarReceptorDoc() {}
}
