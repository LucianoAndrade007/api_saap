<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Pagos",
 *     description="Operaciones relacionadas con los pagos de consumo de agua"
 * )
 */
class PagoDocs
{
    /**
     * @OA\Get(
     *     path="/api/pagos",
     *     tags={"Pagos"},
     *     summary="Listar todos los pagos",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pagos",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarPagosDoc() {}

    /**
     * @OA\Post(
     *     path="/api/pagos",
     *     tags={"Pagos"},
     *     summary="Registrar un nuevo pago",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"consumo_id", "usuario_id", "monto_total"},
     *             @OA\Property(property="consumo_id", type="integer", example=1),
     *             @OA\Property(property="usuario_id", type="integer", example=5),
     *             @OA\Property(property="tipo_usuario_id", type="integer", example=1),
     *             @OA\Property(property="tipo_medidor_id", type="integer", example=2),
     *             @OA\Property(property="m3_consumidos", type="integer", example=15),
     *             @OA\Property(property="valor_m3_agua", type="integer", example=550),
     *             @OA\Property(property="valor_fijo_agua", type="integer", example=1000),
     *             @OA\Property(property="valor_m3_alcantarillado", type="integer", example=450),
     *             @OA\Property(property="valor_fijo_alcantarillado", type="integer", example=1000),
     *             @OA\Property(property="iva", type="integer", example=722),
     *             @OA\Property(property="monto_total", type="integer", example=4800)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pago creado exitosamente"
     *     )
     * )
     */
    public function crearPagoDoc() {}

    /**
     * @OA\Get(
     *     path="/api/pagos/{id}",
     *     tags={"Pagos"},
     *     summary="Obtener un pago por ID",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles del pago"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pago no encontrado"
     *     )
     * )
     */
    public function obtenerPagoPorIdDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/pagos/{id}",
     *     tags={"Pagos"},
     *     summary="Eliminar un pago",
     *     description="Soft delete del pago.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pago eliminado correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pago no encontrado"
     *     )
     * )
     */
    public function eliminarPagoDoc() {}

    /**
     * @OA\Post(
     *     path="/api/pagos/generar-desde-consumo",
     *     tags={"Pagos"},
     *     summary="Generar un pago a partir del consumo",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="consumo",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=12),
     *                 @OA\Property(property="usuario_id", type="integer", example=7),
     *                 @OA\Property(property="consumo", type="integer", example=15),
     *                 @OA\Property(property="fecha_lectura", type="string", format="date-time", example="2025-07-01T10:00:00")
     *             ),
     *             @OA\Property(
     *                 property="tarifas",
     *                 type="object",
     *                 @OA\Property(property="valor_m3_agua", type="integer", example=550),
     *                 @OA\Property(property="valor_m3_alcantarillado", type="integer", example=450),
     *                 @OA\Property(property="valor_fijo_agua", type="integer", example=1000),
     *                 @OA\Property(property="valor_fijo_alcantarillado", type="integer", example=1000)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pago generado correctamente"
     *     )
     * )
     */
    public function generarDesdeConsumoDoc() {}
}
