<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="CategoríasUsuarios",
 *     description="Operaciones relacionadas con las categorías de usuarios"
 * )
 */
class CategoriaUsuarioDocs
{
    /**
     * @OA\Get(
     *     path="/api/categorias-usuarios",
     *     tags={"CategoríasUsuarios"},
     *     summary="Listar todas las categorías de usuarios",
     *     description="Devuelve una lista de todas las categorías de usuarios.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de categorías",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarCategoriasUsuariosDoc() {}

    /**
     * @OA\Post(
     *     path="/api/categorias-usuarios",
     *     tags={"CategoríasUsuarios"},
     *     summary="Crear una nueva categoría de usuario",
     *     description="Crea una nueva categoría de usuario.",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre"},
     *             @OA\Property(property="nombre", type="string", example="Industrial"),
     *             @OA\Property(property="descripcion", type="string", example="Pagan Iva"),
     *             @OA\Property(property="creado_por", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Categoría creada correctamente"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación"
     *     )
     * )
     */
    public function crearCategoriaUsuarioDoc() {}

    /**
     * @OA\Get(
     *     path="/api/categorias-usuarios/{id}",
     *     tags={"CategoríasUsuarios"},
     *     summary="Obtener una categoría de usuario por ID",
     *     description="Devuelve los datos de una categoría de usuario específica.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos de la categoría"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoría no encontrada"
     *     )
     * )
     */
    public function obtenerCategoriaUsuarioIdDoc() {}

    /**
     * @OA\Put(
     *     path="/api/categorias-usuarios/{id}",
     *     tags={"CategoríasUsuarios"},
     *     summary="Actualizar una categoría de usuario",
     *     description="Actualiza los datos de una categoría de usuario.",
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
     *             required={"nombre"},
     *             @OA\Property(property="nombre", type="string", example="Supervisor"),
     *             @OA\Property(property="descripcion", type="string", example="Pagan Iva"),
     *             @OA\Property(property="modificado_por", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoría no encontrada"
     *     )
     * )
     */
    public function actualizarCategoriaUsuarioDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/categorias-usuarios/{id}",
     *     tags={"CategoríasUsuarios"},
     *     summary="Eliminar una categoría de usuario",
     *     description="Realiza un borrado lógico (SoftDelete) de una categoría de usuario.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría eliminada correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoría no encontrada"
     *     )
     * )
     */
    public function eliminarCategoriaUsuarioDoc() {}

    /**
     * @OA\Put(
     *     path="/api/categorias-usuarios/{id}/restaurar",
     *     tags={"CategoríasUsuarios"},
     *     summary="Restaurar una categoría de usuario eliminada",
     *     description="Restaura una categoría previamente eliminada.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría restaurada correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoría no encontrada"
     *     )
     * )
     */
    public function restaurarCategoriaUsuarioDoc() {}

    /**
     * @OA\Get(
     *     path="/api/categorias-usuarios-eliminados",
     *     tags={"CategoríasUsuarios"},
     *     summary="Listar categorías de usuarios eliminadas",
     *     description="Devuelve las categorías que han sido eliminadas lógicamente.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de categorías eliminadas",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarCategoriasEliminadasDoc() {}
}
