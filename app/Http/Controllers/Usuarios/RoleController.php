<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function show($id)
    {
        return Role::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'guard_name' => 'nullable|string|max:50',
            'creado_por' => 'nullable|integer',
            'estado' => 'nullable|boolean',
        ]);

        $role = Role::create($validated);

        return response()->json([
            'message' => 'Rol creado correctamente',
            'data' => $role,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'guard_name' => 'nullable|string|max:50',
            'modificado_por' => 'nullable|integer',
            'estado' => 'nullable|boolean',
        ]);

        $role->update($validated);

        return response()->json([
            'message' => 'Rol actualizado correctamente',
            'data' => $role,
        ]);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'message' => 'Rol eliminado correctamente',
        ]);
    }
}
