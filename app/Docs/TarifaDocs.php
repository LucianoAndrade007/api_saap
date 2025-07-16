<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Tarifas",
 *     description="Gestión de tarifas de agua y alcantarillado"
 * )
 */
class TarifaDocs
{
    /**
     * @OA\Post(
     *     path="/api/tarifas",
     *     tags={"Tarifas"},
     *     summary="Crear una nueva tarifa. Si existe una tarifa activa para el mismo medidor y categoría, será eliminada (soft delete)",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"c_f_agua", "c_f_alcan", "m3_agua", "m3_alcan", "actualizado_por_id"},
     *             @OA\Property(property="categorias_usuarios_id", type="integer", example=1),
     *             @OA\Property(property="tipos_medidor_id", type="integer", example=2),
     *             @OA\Property(property="c_f_agua", type="integer", example=2500),
     *             @OA\Property(property="c_f_alcan", type="integer", example=1000),
     *             @OA\Property(property="m3_agua", type="integer", example=550),
     *             @OA\Property(property="m3_alcan", type="integer", example=450),
     *             @OA\Property(property="actualizado_por_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Tarifa creada exitosamente"),
     *     @OA\Response(response=422, description="Errores de validación")
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/agrupadas",
     *     tags={"Tarifas"},
     *     summary="Listar tarifas agrupadas por categoría y tipo de medidor",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Tarifas agrupadas correctamente")
     * )
     */
    public function agrupadas() {}
}
