<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\UsuarioSuspendido;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioSuspendidoRequest;


class UsuarioSuspendidoController extends Controller
{
    public function index()
    {
        return response()->json(UsuarioSuspendido::all());
    }

    public function store(StoreUsuarioSuspendidoRequest $request)
    {
        $suspension = UsuarioSuspendido::create($request->validated());
        return response()->json($suspension, 201);
    }

    public function show($id)
    {
        $item = UsuarioSuspendido::find($id);
        if (!$item) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = UsuarioSuspendido::find($id);
        if (!$item) return response()->json(['message' => 'No encontrado'], 404);

        $data = $request->validate([
            'fecha_suspension' => 'nullable|date',
            'estado' => 'sometimes|integer',
        ]);

        $item->update($data);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = UsuarioSuspendido::find($id);
        if (!$item) return response()->json(['message' => 'No encontrado'], 404);

        $item->delete();
        return response()->json(['message' => 'Usuario suspendido eliminado (soft delete)']);
    }

    public function eliminados()
    {
        $eliminados = UsuarioSuspendido::onlyTrashed()->get();
        return response()->json($eliminados);
    }

    public function restore($id)
    {
        $item = UsuarioSuspendido::onlyTrashed()->find($id);
        if (!$item) {
            return response()->json(['message' => 'No encontrado o no eliminado'], 404);
        }

        $item->restore();
        return response()->json(['message' => 'Usuario suspendido restaurado', 'data' => $item]);
    }
}
