<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Medidores",
 *     description="Operaciones relacionadas con los medidores de agua"
 * )
 */
class MedidorDocs
{
    /**
     * @OA\Get(
     *     path="/api/medidores",
     *     tags={"Medidores"},
     *     summary="Listar todos los medidores",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de medidores",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarMedidoresDoc() {}

    /**
     * @OA\Post(
     *     path="/api/medidores",
     *     tags={"Medidores"},
     *     summary="Registrar un nuevo medidor",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"usuario_id", "codigo"},
     *             @OA\Property(property="usuario_id", type="integer", example=1),
     *             @OA\Property(property="tipo_medidor_id", type="integer", example=2),
     *             @OA\Property(property="alcantarillado", type="boolean", example=true),
     *             @OA\Property(property="codigo", type="string", example="MED-12345"),
     *             @OA\Property(property="codigo_casa", type="string", example="CASA-12"),
     *             @OA\Property(property="activo", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Medidor registrado exitosamente"
     *     )
     * )
     */
    public function crearMedidorDoc() {}

    /**
     * @OA\Get(
     *     path="/api/medidores/{id}",
     *     tags={"Medidores"},
     *     summary="Obtener un medidor por ID",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles del medidor"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Medidor no encontrado"
     *     )
     * )
     */
    public function obtenerMedidorPorIdDoc() {}

    /**
     * @OA\Put(
     *     path="/api/medidores/{id}",
     *     tags={"Medidores"},
     *     summary="Actualizar un medidor",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=false,
     *         @OA\JsonContent(
     *             @OA\Property(property="tipo_medidor_id", type="integer", example=2),
     *             @OA\Property(property="alcantarillado", type="boolean", example=true),
     *             @OA\Property(property="codigo_casa", type="string", example="CASA-14"),
     *             @OA\Property(property="activo", type="boolean", example=false)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Medidor actualizado exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Medidor no encontrado"
     *     )
     * )
     */
    public function actualizarMedidorDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/medidores/{id}",
     *     tags={"Medidores"},
     *     summary="Eliminar un medidor (soft delete)",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Medidor eliminado correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Medidor no encontrado"
     *     )
     * )
     */
    public function eliminarMedidorDoc() {}
}
