<?php

namespace App\Http\Controllers\Finanzas;

use App\Http\Controllers\Controller;
use App\Models\IngresoEgreso;
use Illuminate\Http\Request;

class IngresoEgresoController extends Controller
{
    public function index()
    {
        return IngresoEgreso::with('usuario')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo' => 'required|in:ingreso,egreso',
            'monto' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        return IngresoEgreso::create($data);
    }

    public function show($id)
    {
        return IngresoEgreso::with('usuario')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $movimiento = IngresoEgreso::findOrFail($id);

        $data = $request->validate([
            'tipo' => 'sometimes|in:ingreso,egreso',
            'monto' => 'sometimes|numeric|min:0',
            'descripcion' => 'nullable|string',
            'fecha' => 'sometimes|date',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $movimiento->update($data);

        return $movimiento;
    }

    public function destroy($id)
    {
        IngresoEgreso::findOrFail($id)->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
