<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="RegistroConsumo",
 *     description="Operaciones relacionadas con los registros de consumo de agua"
 * )
 */
class RegistroConsumoDocs
{
    /**
     * @OA\Get(
     *     path="/api/registro-consumo",
     *     tags={"RegistroConsumo"},
     *     summary="Listar todos los registros de consumo",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de consumos",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarConsumosDoc() {}

    /**
     * @OA\Post(
     *     path="/api/registro-consumo",
     *     tags={"RegistroConsumo"},
     *     summary="Registrar un nuevo consumo y generar pago automáticamente",
     *     description="Registra una nueva lectura de consumo. Al mismo tiempo, se genera un pago asociado basado en las tarifas vigentes para el usuario y tipo de medidor.",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"medidor_id", "usuario_id", "consumo", "fecha_lectura", "administrador_id"},
     *             @OA\Property(property="medidor_id", type="integer", example=1),
     *             @OA\Property(property="usuario_id", type="integer", example=2),
     *             @OA\Property(property="consumo", type="integer", example=120),
     *             @OA\Property(property="costo_reposicion_servicio", type="integer", example=0),
     *             @OA\Property(property="multa_intervencion_servicio", type="integer", example=0),
     *             @OA\Property(property="fecha_lectura", type="string", format="date-time", example="2025-07-01T10:00:00"),
     *             @OA\Property(property="foto", type="string", example="foto.jpg"),
     *             @OA\Property(property="comentarios", type="string", example="Problema de tal motivo"),
     *             @OA\Property(property="origen", type="string", example="WEB o MOVIL"),
     *             @OA\Property(property="lectura_enviada", type="boolean", example=false),
     *             @OA\Property(property="administrador_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Consumo registrado y pago generado automáticamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Lectura registrada correctamente.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al registrar el consumo o generar el pago"
     *     )
     * )
     */

    public function crearConsumoDoc() {}

    /**
     * @OA\Get(
     *     path="/api/registro-consumo/{id}",
     *     tags={"RegistroConsumo"},
     *     summary="Obtener un consumo por ID",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del consumo"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Consumo no encontrado"
     *     )
     * )
     */
    public function obtenerConsumoPorIdDoc() {}

    /**
     * @OA\Put(
     *     path="/api/registro-consumo/{id}",
     *     tags={"RegistroConsumo"},
     *     summary="Actualizar un consumo",
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
     *             @OA\Property(property="consumo", type="integer", example=150),
     *             @OA\Property(property="comentarios", type="string", example="Actualizado por revisión")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Consumo actualizado"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Consumo no encontrado"
     *     )
     * )
     */
    public function actualizarConsumoDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/registro-consumo/{id}",
     *     tags={"RegistroConsumo"},
     *     summary="Eliminar un consumo",
     *     description="Soft delete de un registro de consumo.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Consumo eliminado"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Consumo no encontrado"
     *     )
     * )
     */
    public function eliminarConsumoDoc() {}

    /**
     * @OA\Get(
     *     path="/api/registro-consumo/usuario/{usuario_id}/medidor/{medidor_id}",
     *     tags={"RegistroConsumo"},
     *     summary="Obtener lecturas por usuario y medidor",
     *     description="Retorna todas las lecturas de un usuario específico y un medidor dado, ordenadas por fecha de lectura descendente.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="usuario_id",
     *         in="path",
     *         required=true,
     *         description="ID del usuario",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="medidor_id",
     *         in="path",
     *         required=true,
     *         description="ID del medidor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de lecturas del usuario para el medidor",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(type="object")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario o medidor no encontrado"
     *     )
     * )
     */
    public function lecturasPorUsuarioYMedidorDoc() {}

}
