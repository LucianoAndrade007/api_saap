<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\AdminRol;
use Illuminate\Http\Request;

class AdminRolController extends Controller
{
    public function index()
    {
        return AdminRol::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_rol' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'nivel' => 'nullable|integer|min:1',
        ]);

        return AdminRol::create($data);
    }

    public function show($id)
    {
        return AdminRol::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $rol = AdminRol::findOrFail($id);

        $data = $request->validate([
            'nombre_rol' => 'sometimes|string|max:100',
            'descripcion' => 'nullable|string',
            'nivel' => 'nullable|integer|min:1',
        ]);

        $rol->update($data);

        return $rol;
    }

    public function destroy($id)
    {
        $rol = AdminRol::findOrFail($id);
        $rol->delete();

        return response()->json(['message' => 'Rol eliminado']);
    }
}
