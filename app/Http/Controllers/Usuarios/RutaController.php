<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Ruta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RutaController extends Controller
{
    public function index()
    {
        return response()->json(Ruta::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $ruta = Ruta::create($data);
        return response()->json($ruta, 201);
    }

    public function show($id)
    {
        $ruta = Ruta::find($id);
        if (!$ruta) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($ruta);
    }

    public function update(Request $request, $id)
    {
        $ruta = Ruta::find($id);
        if (!$ruta) return response()->json(['message' => 'No encontrado'], 404);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $ruta->update($data);
        return response()->json($ruta);
    }

    public function destroy($id)
    {
        $ruta = Ruta::find($id);
        if (!$ruta) return response()->json(['message' => 'No encontrado'], 404);

        $ruta->delete();
        return response()->json(['message' => 'Ruta eliminada (soft delete)']);
    }

    public function eliminados()
    {
        return response()->json(Ruta::onlyTrashed()->get());
    }

    public function restore($id)
    {
        $ruta = Ruta::onlyTrashed()->find($id);
        if (!$ruta) return response()->json(['message' => 'No encontrado o no eliminado'], 404);

        $ruta->restore();
        return response()->json(['message' => 'Ruta restaurada', 'data' => $ruta]);
    }
}
