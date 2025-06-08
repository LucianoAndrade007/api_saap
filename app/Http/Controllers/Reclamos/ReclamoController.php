<?php

namespace App\Http\Controllers\Reclamos;

use App\Http\Controllers\Controller;
use App\Models\Reclamo;
use Illuminate\Http\Request;

class ReclamoController extends Controller
{
    public function index()
    {
        return Reclamo::with(['usuario', 'tipo'])->latest()->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'claim_type_id' => 'required|exists:claims_type,id',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'estado' => 'nullable|in:pendiente,resuelto,en_proceso',
        ]);

        return Reclamo::create($data);
    }

    public function show($id)
    {
        return Reclamo::with(['usuario', 'tipo'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $reclamo = Reclamo::findOrFail($id);

        $data = $request->validate([
            'descripcion' => 'sometimes|string',
            'estado' => 'sometimes|in:pendiente,resuelto,en_proceso',
            'fecha' => 'sometimes|date',
        ]);

        $reclamo->update($data);

        return $reclamo;
    }

    public function destroy($id)
    {
        Reclamo::findOrFail($id)->delete();
        return response()->json(['message' => 'Reclamo eliminado']);
    }
}
