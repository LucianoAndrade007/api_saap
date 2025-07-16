<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Otras Tarifas",
 *     description="Gestión de otras tarifas como cargos por conexión, instalación u otros"
 * )
 */
class OtrasTarifaDocs
{
    /**
     * @OA\Post(
     *     path="/api/otras-tarifas",
     *     tags={"Otras Tarifas"},
     *     summary="Crear una nueva tarifa adicional",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"categoria", "name", "codigo", "valor", "id_usuario_admin"},
     *             @OA\Property(property="categoria", type="string", maxLength=20, example="instalacion"),
     *             @OA\Property(property="orden", type="integer", example=1),
     *             @OA\Property(property="name", type="string", maxLength=300, example="Cargo por instalación"),
     *             @OA\Property(property="codigo", type="string", maxLength=50, example="OTR-001"),
     *             @OA\Property(property="valor", type="integer", example=15000),
     *             @OA\Property(property="id_usuario_admin", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Tarifa registrada correctamente"),
     *     @OA\Response(response=422, description="Errores de validación"),
     *     @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/otras-tarifas",
     *     tags={"Otras Tarifas"},
     *     summary="Listar todas las otras tarifas activas",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Listado de tarifas obtenido correctamente")
     * )
     */
    public function index() {}
}
