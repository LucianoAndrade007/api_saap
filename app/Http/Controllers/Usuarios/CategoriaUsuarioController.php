<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\CategoriaUsuario;
use Illuminate\Http\Request;

class CategoriaUsuarioController extends Controller
{
    public function index()
    {
        return CategoriaUsuario::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:255',
            'creado_por' => 'nullable|integer',
        ]);

        return CategoriaUsuario::create($validated);
    }

    public function show($id)
    {
        return CategoriaUsuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $categoria = CategoriaUsuario::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:255',
            'modificado_por' => 'nullable|integer',
        ]);

        $categoria->update($validated);

        return $categoria;
    }

    public function destroy($id)
    {
        $categoria = CategoriaUsuario::findOrFail($id);
        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada']);
    }
    
    public function restore($id)
    {
        $categoria = CategoriaUsuario::withTrashed()->findOrFail($id);
        $categoria->restore();

        return response()->json(['message' => 'Categoría restaurada'], 200);
    }

    public function eliminados()
    {
        $categorias = CategoriaUsuario::onlyTrashed()->get();
        return response()->json($categorias);
    }


}
