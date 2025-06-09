<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Rutas",
 *     description="Gestión de rutas geográficas"
 * )
 */
class RutaDocs
{
    /**
     * @OA\Get(
     *     path="/api/rutas",
     *     tags={"Rutas"},
     *     summary="Listar todas las rutas",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Lista de rutas")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/rutas",
     *     tags={"Rutas"},
     *     summary="Crear una nueva ruta",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"nombre"},
     *             @OA\Property(property="nombre", type="string", example="Ruta Norte"),
     *             @OA\Property(property="descripcion", type="string", example="Sector norte del pueblo")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Ruta creada exitosamente")
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/rutas/{id}",
     *     tags={"Rutas"},
     *     summary="Ver detalle de una ruta",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detalle de ruta"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/rutas/{id}",
     *     tags={"Rutas"},
     *     summary="Actualizar una ruta",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="nombre", type="string", example="Ruta Sur"),
     *             @OA\Property(property="descripcion", type="string", example="Zona sur de la comuna")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Ruta actualizada"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/rutas/{id}",
     *     tags={"Rutas"},
     *     summary="Eliminar (soft delete) una ruta",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Ruta eliminada"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function destroy() {}

    /**
     * @OA\Get(
     *     path="/api/rutas-eliminadas",
     *     tags={"Rutas"},
     *     summary="Listar rutas eliminadas",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Lista de rutas eliminadas")
     * )
     */
    public function eliminadas() {}

    /**
     * @OA\Put(
     *     path="/api/rutas-restaurar/{id}",
     *     tags={"Rutas"},
     *     summary="Restaurar una ruta eliminada",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Ruta restaurada"),
     *     @OA\Response(response=404, description="No encontrado o no eliminada")
     * )
     */
    public function restore() {}
}
