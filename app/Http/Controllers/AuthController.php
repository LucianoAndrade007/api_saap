<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $fields = $request->validate([
            'run' => 'required|string|unique:usuarios,run',
            'nombre_usuario' => 'required|string',
            'nombre' => 'required|string',
            'segundoNombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|email|unique:usuarios,email',
            'telefono_movil' => 'nullable|string',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'run' => $fields['run'],
            'nombre_usuario' => $fields['nombre_usuario'],
            'nombre' => $fields['nombre'],
            'segundoNombre' => $fields['segundoNombre'],
            'apellido' => $fields['apellido'],
            'email' => $fields['email'],
            'telefono_movil' => $fields['telefono_movil'] ?? null,
            'password' => bcrypt($fields['password']),
            'activo' => true,
            'verificado' => false,
            'en_linea' => false,
            'reset_pass' => false,
            'password_reset_code' => null,
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Credenciales incorrectas',
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente',
        ]);
    }

    public function index()
    {
        return response()->json(User::latest()->get());
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }

}
