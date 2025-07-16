<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\UsuarioAdminDato;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuarioAdminDatoController extends Controller
{
    public function index()
    {
        return response()->json(UsuarioAdminDato::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|integer|unique:usuarios_admin_datos,usuario_id',
            'imagen' => 'nullable|string',
            'ultima_ip' => 'nullable|ip',
            'rol_id' => 'nullable|integer',
            'token' => 'nullable|string',
        ]);

        $dato = UsuarioAdminDato::create($validated);
        return response()->json($dato, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $dato = UsuarioAdminDato::find($id);
        if (!$dato) return response()->json(['message' => 'No encontrado'], Response::HTTP_NOT_FOUND);
        return response()->json($dato);
    }

    public function update(Request $request, $id)
    {
        $dato = UsuarioAdminDato::find($id);
        if (!$dato) return response()->json(['message' => 'No encontrado'], Response::HTTP_NOT_FOUND);

        $validated = $request->validate([
            'imagen' => 'nullable|string',
            'ultima_ip' => 'nullable|ip',
            'rol_id' => 'nullable|integer',
            'token' => 'nullable|string',
        ]);

        $dato->update($validated);
        return response()->json($dato);
    }

    public function destroy($id)
    {
        $dato = UsuarioAdminDato::find($id);
        if (!$dato) return response()->json(['message' => 'No encontrado'], Response::HTTP_NOT_FOUND);

        $dato->delete();
        return response()->json(['message' => 'Dato eliminado (soft delete)']);
    }

    public function eliminados()
    {
        $datos = UsuarioAdminDato::onlyTrashed()->get();
        return response()->json($datos);
    }

    public function restore($id)
    {
        $dato = UsuarioAdminDato::onlyTrashed()->find($id);
        if (!$dato) {
            return response()->json(['message' => 'No encontrado o no eliminado'], Response::HTTP_NOT_FOUND);
        }

        $dato->restore();
        return response()->json(['message' => 'Dato restaurado', 'data' => $dato]);
    }

    public function operadores()
    {
        $operadores = UsuarioAdminDato::with('usuario', 'rol') // asegúrate de tener la relación definida
            ->get();

        return response()->json(['data' => $operadores]);
    }
}
