<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function index()
    {
        return Ruta::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo' => 'nullable|string|max:20|unique:route,codigo',
            'descripcion' => 'nullable|string',
        ]);

        return Ruta::create($data);
    }

    public function show($id)
    {
        return Ruta::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ruta = Ruta::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'codigo' => 'nullable|string|max:20|unique:route,codigo,' . $ruta->id,
            'descripcion' => 'nullable|string',
        ]);

        $ruta->update($data);

        return $ruta;
    }

    public function destroy($id)
    {
        Ruta::findOrFail($id)->delete();
        return response()->json(['message' => 'Ruta eliminada']);
    }
}
