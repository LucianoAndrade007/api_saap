<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return response()->json([
            'message' => 'Usuarios listados correctamente',
            'data' => $usuarios
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'run' => 'required|string|max:20',
            'nombre_usuario' => 'required|string|max:100',
            'telefono_movil' => 'required|string|max:20',
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'nullable|string|max:100',
            'apellido_materno' => 'nullable|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'message' => 'Usuario creado',
            'data' => $user->makeHidden(['password']),
        ], 201);
    }

    public function show(User $usuario)
    {
        return response()->json($usuario->makeHidden(['password']));
    }

    public function update(Request $request, User $usuario)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'string|max:100',
            'telefono_movil' => 'required|string|max:20',
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'nullable|string|max:100',
            'apellido_materno' => 'nullable|string|max:100',
            'email' => 'sometimes|email|unique:usuarios,email,' . $usuario->id,
        ]);
        
        // Encriptar la contraseña
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $usuario->update($validated);

        return response()->json([
            'message' => 'Usuario actualizado',
            'data' => $usuario->makeHidden(['password']),
        ]);
    }

    public function destroy($id)
    {
        $usuario = User::withTrashed()->find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario desactivado']);
    }


    public function restaurar($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return response()->json([
            'message' => 'Usuario restaurado correctamente',
            'data' => $user,
        ]);
    }

    public function eliminados()
    {
        return User::onlyTrashed()->get();
    }

    public function cambiarPassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required|string',
            'nueva_password' => 'required|string|min:8|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->password_actual, $user->password)) {
            return response()->json(['message' => 'La contraseña actual no es correcta'], 403);
        }

        $user->password = Hash::make($request->nueva_password);
        $user->save();

        return response()->json(['message' => 'Contraseña actualizada correctamente']);
    }

}
