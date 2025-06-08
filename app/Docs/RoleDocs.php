<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Roles",
 *     description="Operaciones relacionadas con los roles del sistema"
 * )
 */
class RoleDocs
{
    /**
     * @OA\Get(
     *     path="/api/roles",
     *     tags={"Roles"},
     *     summary="Listar todos los roles",
     *     description="Devuelve una lista de todos los roles.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de roles",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarRolesDoc() {}

    /**
     * @OA\Post(
     *     path="/api/roles",
     *     tags={"Roles"},
     *     summary="Crear un nuevo rol",
     *     description="Crea un nuevo rol.",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre"},
     *             @OA\Property(property="nombre", type="string", example="Administrador"),
     *             @OA\Property(property="guard_name", type="string", example="web"),
     *             @OA\Property(property="creado_por", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Rol creado correctamente"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación"
     *     )
     * )
     */
    public function crearRolDoc() {}

    /**
     * @OA\Get(
     *     path="/api/roles/{id}",
     *     tags={"Roles"},
     *     summary="Obtener un rol por ID",
     *     description="Devuelve los datos de un rol específico.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del rol"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Rol no encontrado"
     *     )
     * )
     */
    public function obtenerRolIdDoc() {}

    /**
     * @OA\Put(
     *     path="/api/roles/{id}",
     *     tags={"Roles"},
     *     summary="Actualizar un rol",
     *     description="Actualiza los datos de un rol existente.",
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
     *             @OA\Property(property="guard_name", type="string", example="web"),
     *             @OA\Property(property="modificado_por", type="integer", example=2),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Rol actualizado"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Rol no encontrado"
     *     )
     * )
     */
    public function actualizarRolDoc() {}

    /**
     * @OA\Delete(
     *     path="/api/roles/{id}",
     *     tags={"Roles"},
     *     summary="Eliminar un rol",
     *     description="Realiza un borrado lógico (SoftDelete) de un rol.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Rol eliminado correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Rol no encontrado"
     *     )
     * )
     */
    public function eliminarRolDoc() {}

    /**
     * @OA\Put(
     *     path="/api/roles/{id}/restaurar",
     *     tags={"Roles"},
     *     summary="Restaurar un rol eliminado",
     *     description="Restaura un rol previamente eliminado.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Rol restaurado correctamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Rol no encontrado"
     *     )
     * )
     */
    public function restaurarRolDoc() {}

    /**
     * @OA\Get(
     *     path="/api/roles-eliminados",
     *     tags={"Roles"},
     *     summary="Listar roles eliminados",
     *     description="Devuelve todos los roles que han sido eliminados lógicamente.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de roles eliminados",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(type="object")
     *         )
     *     )
     * )
     */
    public function listarRolesEliminadosDoc() {}
}
