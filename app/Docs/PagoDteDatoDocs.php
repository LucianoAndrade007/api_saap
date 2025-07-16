<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="PagosDTE",
 *     description="Operaciones relacionadas con los datos de documentos tributarios electrónicos (DTE) asociados a pagos"
 * )
 */
class PagoDteDatoDocs
{
    /**
     * @OA\Get(
     *     path="/api/pagos-dte-datos",
     *     tags={"PagosDTE"},
     *     summary="Listar todos los registros DTE de pagos",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pagos_dte_datos",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarDteDatosDoc() {}

    /**
     * @OA\Post(
     *     path="/api/pagos-dte-datos",
     *     tags={"PagosDTE"},
     *     summary="Registrar datos DTE para un pago",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"numero_folio"},
     *             @OA\Property(property="numero_folio", type="integer", example=105012),
     *             @OA\Property(property="timbre", type="string", example="timbre_base64"),
     *             @OA\Property(property="numero_resolucion", type="integer", example=80),
     *             @OA\Property(property="fecha_resolucion", type="string", format="date", example="2024-01-10"),
     *             @OA\Property(property="token", type="string", example="token_autorizacion"),
     *             @OA\Property(property="pdf", type="string", format="binary", example="archivo.pdf"),
     *             @OA\Property(property="es_visible", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Datos DTE registrados exitosamente"
     *     )
     * )
     */
    public function crearDteDatosDoc() {}

    /**
     * @OA\Get(
     *     path="/api/pagos-dte-datos/{id}",
     *     tags={"PagosDTE"},
     *     summary="Obtener datos DTE por ID",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del DTE"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Registro DTE no encontrado"
     *     )
     * )
     */
    public function obtenerDteDatosPorIdDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/pagos-dte-datos/{id}",
     *     tags={"PagosDTE"},
     *     summary="Eliminar datos DTE de un pago",
     *     description="Soft delete del registro de datos DTE.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos DTE eliminados correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Datos DTE no encontrados"
     *     )
     * )
     */
    public function eliminarDteDatosDoc() {}
}
