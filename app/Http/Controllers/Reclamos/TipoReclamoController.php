<?php

namespace App\Http\Controllers\Reclamos;

use App\Http\Controllers\Controller;
use App\Models\TipoReclamo;
use Illuminate\Http\Request;

class TipoReclamoController extends Controller
{
    public function index()
    {
        return TipoReclamo::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:claim_types,name',
        ]);

        return TipoReclamo::create($data);
    }

    public function show($id)
    {
        return TipoReclamo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $tipo = TipoReclamo::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|string|unique:claim_types,name,' . $id . ',id_claims_type',
            'status' => 'sometimes|integer',
        ]);

        if (isset($data['name'])) {
            $tipo->name = $data['name'];
        }

        if (isset($data['status'])) {
            $tipo->status = $data['status'];
        }

        $tipo->save();  // Forzamos guardado

        return response()->json([
            'message' => 'Tipo de reclamo actualizado',
            'data' => $tipo,
        ]);
    }



    public function destroy($id)
    {
        TipoReclamo::findOrFail($id)->delete();
        return response()->json(['message' => 'Tipo de reclamo eliminado']);
    }
    
}
