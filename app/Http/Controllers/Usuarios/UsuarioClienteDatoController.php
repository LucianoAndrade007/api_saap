<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\UsuarioClienteDato;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuarioClienteDatoController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $datos = UsuarioClienteDato::with(['usuario', 'ruta', 'ultimaLectura'])->get();

        return response()->json($datos);
    }

    // Mostrar un solo registro por ID de usuario
    public function show($usuario_id)
    {
        $dato = UsuarioClienteDato::with('usuario', 'ruta')->findOrFail($usuario_id);
        return response()->json($dato);
    }

    // Crear nuevo registro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id|unique:usuarios_cliente_datos,usuario_id',
            'alias' => 'nullable|string|max:255',
            'giro' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'numero_casa' => 'nullable|string|max:50',
            'ciudad' => 'nullable|string|max:255',
            'numero_cliente' => 'nullable|string|max:50',
            'factura' => 'boolean',
            'subsidio_apr' => 'boolean',
            'tipo_cliente_id' => 'nullable|integer',
            'id_ruta' => 'nullable|exists:rutas,id',
            'subsidio_municipal' => 'boolean',
            'porcentaje_desc_municipal' => 'nullable|numeric',
            'mcs_desc_municipal' => 'nullable|numeric',
            'fijos_desc_municipal' => 'nullable|numeric',
            'numero_resolucion' => 'nullable|string|max:100',
            'puntaje_ficha' => 'nullable|numeric',
            'fecha_encuesta' => 'nullable|date',
            'numunico' => 'nullable|string',
            'dv_numunico' => 'nullable|string|max:1',
            'fecha_inicio' => 'nullable|date',
            'fecha_termino' => 'nullable|date',
        ]);

        $dato = UsuarioClienteDato::create($validated);
        return response()->json($dato, Response::HTTP_CREATED);
    }

    // Actualizar registro
    public function update(Request $request, $usuario_id)
    {
        $dato = UsuarioClienteDato::findOrFail($usuario_id);

        $validated = $request->validate([
            'alias' => 'nullable|string|max:255',
            'giro' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'numero_casa' => 'nullable|string|max:50',
            'ciudad' => 'nullable|string|max:255',
            'numero_cliente' => 'nullable|string|max:50',
            'factura' => 'boolean',
            'subsidio_apr' => 'boolean',
            'tipo_cliente_id' => 'nullable|integer',
            'id_ruta' => 'nullable|exists:rutas,id',
            'subsidio_municipal' => 'boolean',
            'porcentaje_desc_municipal' => 'nullable|numeric',
            'mcs_desc_municipal' => 'nullable|numeric',
            'fijos_desc_municipal' => 'nullable|numeric',
            'numero_resolucion' => 'nullable|string|max:100',
            'puntaje_ficha' => 'nullable|numeric',
            'fecha_encuesta' => 'nullable|date',
            'numunico' => 'nullable|string',
            'dv_numunico' => 'nullable|string|max:1',
            'fecha_inicio' => 'nullable|date',
            'fecha_termino' => 'nullable|date',
        ]);

        $dato->update($validated);
        return response()->json($dato);
    }

    // Eliminar (soft delete)
    public function destroy($usuario_id)
    {
        $dato = UsuarioClienteDato::findOrFail($usuario_id);
        $dato->delete();

        return response()->json(['message' => 'Dato eliminado correctamente.']);
    }
}
