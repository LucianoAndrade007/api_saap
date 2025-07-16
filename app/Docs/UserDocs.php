<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Usuarios",
 *     description="Operaciones relacionadas con los usuarios"
 * )
 */
class UserDocs
{
    /**
     * @OA\Get(
     *     path="/api/usuarios",
     *     tags={"Usuarios"},
     *     summary="Listar todos los usuarios",
     *     description="Devuelve una lista de todos los usuarios activos.",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de usuarios",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     )
     * )
     */
    public function listarUsuariosDoc() {}

    /**
     * @OA\Post(
     *     path="/api/usuarios",
     *     tags={"Usuarios"},
     *     summary="Crear un nuevo usuario",
     *     description="Crea un nuevo usuario en el sistema.",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre", "email", "password"},
     *             @OA\Property(property="run", type="string", example="12345678-9"),
     *             @OA\Property(property="nombre_usuario", type="string", example="lAndrade"),
     *             @OA\Property(property="telefono_movil", type="string", example="912345678"),
     *             @OA\Property(property="nombre", type="string", example="Luciano"),
     *             @OA\Property(property="segundoNombre", type="string", example="Alexis"),
     *             @OA\Property(property="apellido_paterno", type="string", example="Andrade"),
     *             @OA\Property(property="apellido_materno", type="string", example="Patiño"),
     *             @OA\Property(property="email", type="string", example="luciano@example.com"),
     *             @OA\Property(property="password", type="string", example="12345678")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuario creado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Usuario creado"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación"
     *     )
     * )
     */
    public function creaUsuarioDoc() {}
    /**
     * @OA\Get(
     *     path="/api/usuarios/{id}",
     *     tags={"Usuarios"},
     *     summary="Obtener un usuario por ID",
     *     description="Devuelve los datos de un usuario específico.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del usuario",
     *         @OA\JsonContent(type="object")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario no encontrado"
     *     )
     * )
     */
    public function obtenerUsuarioIdDoc() {}
    /**
     * @OA\Put(
     *     path="/api/usuarios/{id}",
     *     tags={"Usuarios"},
     *     summary="Actualizar usuario",
     *     description="Modifica los datos de un usuario.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="run", type="string", example="12345678-9"),
     *             @OA\Property(property="nombre_usuario", type="string", example="lAndrade"),
     *             @OA\Property(property="telefono_movil", type="string", example="912345678"),
     *             @OA\Property(property="nombre", type="string", example="Luciano"),
     *             @OA\Property(property="segundoNombre", type="string", example="Alexis"),
     *             @OA\Property(property="apellido", type="string", example="Andrade"),
     *             @OA\Property(property="apellido_materno", type="string", example="Patiño"),
     *             @OA\Property(property="email", type="string", example="luciano@example.com"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario actualizado",
     *         @OA\JsonContent(type="object")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario no encontrado"
     *     )
     * )
     */
    public function actualizaUsuarioDoc() {}
    /**
     * @OA\Delete(
     *     path="/api/usuarios/{id}",
     *     tags={"Usuarios"},
     *     summary="Desactivar (soft delete) un usuario",
     *     description="Marca un usuario como inactivo en lugar de eliminarlo completamente.",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario desactivado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Usuario desactivado")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario no encontrado"
     *     )
     * )
     */
    public function desactivaUsuarioDoc() {}

    /**
     * @OA\Put(
     *     path="/api/usuarios/{id}/restaurar",
     *     tags={"Usuarios"},
     *     summary="Restaurar usuario eliminado",
     *     description="Restaura un usuario previamente eliminado (SoftDeletes).",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario restaurado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Usuario restaurado correctamente"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario no encontrado"
     *     )
     * )
     */
    public function restauraUsuarioDoc() {}

    /**
     * @OA\Get(
     *     path="/api/usuarios-eliminados",
     *     tags={"Usuarios"},
     *     summary="Listar usuarios eliminados",
     *     description="Devuelve los usuarios que han sido eliminados (SoftDelete).",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de usuarios eliminados",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(type="object")
     *         )
     *     )
     * )
     */
    public function eliminaUsuarioDoc() {}

    /**
     * @OA\Put(
     *     path="/api/usuarios/cambiar-password",
     *     tags={"Usuarios"},
     *     summary="Cambiar la contraseña del usuario autenticado",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"password_actual", "nueva_password", "nueva_password_confirmation"},
     *             @OA\Property(property="password_actual", type="string", example="oldPassword123"),
     *             @OA\Property(property="nueva_password", type="string", example="newPassword123"),
     *             @OA\Property(property="nueva_password_confirmation", type="string", example="newPassword123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contraseña actualizada correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Contraseña actualizada correctamente")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="La contraseña actual no es correcta",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="La contraseña actual no es correcta")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="El campo password_actual es obligatorio.")
     *         )
     *     )
     * )
     */
    public function cambiarPassword() {}

}
