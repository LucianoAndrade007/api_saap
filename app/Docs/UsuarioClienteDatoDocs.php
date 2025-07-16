<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Usuario Cliente Datos",
 *     description="Gestión de datos del cliente asociados al usuario"
 * )
 */
class UsuarioClienteDatoDocs
{
    /**
     * @OA\Get(
     *     path="/api/usuario-cliente-datos",
     *     tags={"Usuario Cliente Datos"},
     *     summary="Listar todos los datos cliente",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Lista de datos cliente")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/usuario-cliente-datos",
     *     tags={"Usuario Cliente Datos"},
     *     summary="Crear nuevo dato cliente",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"usuario_id"},
     *             @OA\Property(property="usuario_id", type="integer", example=1),
     *             @OA\Property(property="alias", type="string", example="Cliente X"),
     *             @OA\Property(property="giro", type="string", example="Comercio"),
     *             @OA\Property(property="direccion", type="string", example="Av. Principal 123"),
     *             @OA\Property(property="numero_casa", type="string", example="456B"),
     *             @OA\Property(property="ciudad", type="string", example="Rancagua"),
     *             @OA\Property(property="numero_cliente", type="string", example="C-00123"),
     *             @OA\Property(property="factura", type="boolean", example=true),
     *             @OA\Property(property="subsidio_apr", type="boolean", example=false),
     *             @OA\Property(property="tipo_cliente_id", type="integer", example=2),
     *             @OA\Property(property="id_ruta", type="integer", example=3),
     *             @OA\Property(property="subsidio_municipal", type="boolean", example=true),
     *             @OA\Property(property="porcentaje_desc_municipal", type="number", format="float", example=25.5),
     *             @OA\Property(property="mcs_desc_municipal", type="number", format="float", example=1000),
     *             @OA\Property(property="fijos_desc_municipal", type="number", format="float", example=500),
     *             @OA\Property(property="numero_resolucion", type="string", example="R-2025-001"),
     *             @OA\Property(property="puntaje_ficha", type="number", format="float", example=8735),
     *             @OA\Property(property="fecha_encuesta", type="string", format="date", example="2024-05-12"),
     *             @OA\Property(property="numunico", type="string", example="12345678"),
     *             @OA\Property(property="dv_numunico", type="string", example="K"),
     *             @OA\Property(property="fecha_inicio", type="string", format="date", example="2024-01-01"),
     *             @OA\Property(property="fecha_termino", type="string", format="date", example="2025-12-31")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Dato cliente creado")
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/usuario-cliente-datos/{id}",
     *     tags={"Usuario Cliente Datos"},
     *     summary="Obtener un dato cliente específico",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del usuario", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Dato cliente encontrado"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/usuario-cliente-datos/{id}",
     *     tags={"Usuario Cliente Datos"},
     *     summary="Actualizar un dato cliente",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del usuario", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="alias", type="string", example="Nuevo alias"),
     *             @OA\Property(property="direccion", type="string", example="Nueva dirección 456"),
     *             @OA\Property(property="ciudad", type="string", example="Talca"),
     *             @OA\Property(property="factura", type="boolean", example=false),
     *             @OA\Property(property="subsidio_apr", type="boolean", example=true),
     *             @OA\Property(property="fecha_termino", type="string", format="date", example="2026-01-01")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Dato cliente actualizado"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/usuario-cliente-datos/{id}",
     *     tags={"Usuario Cliente Datos"},
     *     summary="Eliminar (soft delete) un dato cliente",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del usuario", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Dato cliente eliminado"),
     *     @OA\Response(response=404, description="No encontrado")
     * )
     */
    public function destroy() {}
}
