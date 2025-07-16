<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    public function index()
    {
        return Comuna::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'region_id' => 'required|integer|exists:regiones,id',
        ]);

        $comuna = Comuna::create($validated);

        return response()->json([
            'message' => 'Comuna creada correctamente',
            'data' => $comuna->load('region'),
        ], 201);
    }

    public function show($id)
    {
        return Comuna::with('region')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $comuna = Comuna::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'region_id' => 'required|integer|exists:regiones,id',
        ]);

        $comuna->update($validated);

        return response()->json([
            'message' => 'Comuna actualizada correctamente',
            'data' => $comuna->load('region'),
        ]);
    }

    public function destroy($id)
    {
        $comuna = Comuna::findOrFail($id);
        $comuna->delete();

        return response()->json([
            'message' => 'Comuna eliminada correctamente',
        ]);
    }

    public function eliminados()
    {
        return Comuna::onlyTrashed()->with('region')->get();
    }

    public function restaurar($id)
    {
        $comuna = Comuna::onlyTrashed()->findOrFail($id);
        $comuna->restore();

        return response()->json([
            'message' => 'Comuna restaurada correctamente',
            'data' => $comuna->load('region'),
        ]);
    }
}