<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Comunas",
 *     description="Operaciones relacionadas con las comunas"
 * )
 */
class ComunaDocs
{
    /**
     * @OA\Get(
     *     path="/api/comunas",
     *     tags={"Comunas"},
     *     summary="Listar todas las comunas",
     *     description="Devuelve una lista de todas las comunas con su región asociada.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de comunas",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarComunasDoc() {}

    /**
     * @OA\Post(
     *     path="/api/comunas",
     *     tags={"Comunas"},
     *     summary="Crear una nueva comuna",
     *     description="Crea una nueva comuna en el sistema.",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre", "region_id"},
     *             @OA\Property(property="nombre", type="string", example="Valparaíso"),
     *             @OA\Property(property="region_id", type="integer", example=5)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Comuna creada correctamente"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación"
     *     )
     * )
     */
    public function crearComunaDoc() {}

    /**
     * @OA\Get(
     *     path="/api/comunas/{id}",
     *     tags={"Comunas"},
     *     summary="Obtener una comuna por ID",
     *     description="Devuelve los datos de una comuna específica con su región asociada.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos de la comuna"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comuna no encontrada"
     *     )
     * )
     */
    public function obtenerComunaIdDoc() {}

    /**
     * @OA\Put(
     *     path="/api/comunas/{id}",
     *     tags={"Comunas"},
     *     summary="Actualizar una comuna",
     *     description="Actualiza los datos de una comuna existente.",
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
     *             required={"nombre", "region_id"},
     *             @OA\Property(property="nombre", type="string", example="Viña del Mar"),
     *             @OA\Property(property="region_id", type="integer", example=5)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comuna actualizada correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comuna no encontrada"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación"
     *     )
     * )
     */
    public function actualizarComunaDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/comunas/{id}",
     *     tags={"Comunas"},
     *     summary="Eliminar una comuna",
     *     description="Realiza un borrado lógico (SoftDelete) de una comuna.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comuna eliminada correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comuna no encontrada"
     *     )
     * )
     */
    public function eliminarComunaDoc() {}

    /**
     * @OA\Put(
     *     path="/api/comunas-restaurar/{id}",
     *     tags={"Comunas"},
     *     summary="Restaurar una comuna eliminada",
     *     description="Restaura una comuna previamente eliminada.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comuna restaurada correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comuna no encontrada"
     *     )
     * )
     */
    public function restaurarComunaDoc() {}

    /**
     * @OA\Get(
     *     path="/api/comunas-eliminadas",
     *     tags={"Comunas"},
     *     summary="Listar comunas eliminadas",
     *     description="Devuelve todas las comunas que han sido eliminadas lógicamente.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de comunas eliminadas",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(type="object")
     *         )
     *     )
     * )
     */
    public function listarComunasEliminadasDoc() {}
}