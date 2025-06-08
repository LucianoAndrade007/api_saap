<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Models\ProduccionAgua;
use Illuminate\Http\Request;

class ProduccionAguaController extends Controller
{
    public function index()
    {
        return ProduccionAgua::with('usuario')->orderBy('fecha', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'litros_producidos' => 'required|numeric|min:0',
            'litros_consumidos' => 'nullable|numeric|min:0',
            'presion' => 'nullable|numeric|min:0',
            'turno' => 'nullable|string',
            'observacion' => 'nullable|string',
            'usuario_id' => 'required|exists:users,id',
        ]);

        return ProduccionAgua::create($data);
    }

    public function show($id)
    {
        return ProduccionAgua::with('usuario')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $registro = ProduccionAgua::findOrFail($id);

        $data = $request->validate([
            'fecha' => 'sometimes|date',
            'litros_producidos' => 'sometimes|numeric|min:0',
            'litros_consumidos' => 'nullable|numeric|min:0',
            'presion' => 'nullable|numeric|min:0',
            'turno' => 'nullable|string',
            'observacion' => 'nullable|string',
            'usuario_id' => 'sometimes|exists:users,id',
        ]);

        $registro->update($data);

        return $registro;
    }

    public function destroy($id)
    {
        ProduccionAgua::findOrFail($id)->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
