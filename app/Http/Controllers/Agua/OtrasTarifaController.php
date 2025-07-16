<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Models\Agua\OtrasTarifa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTarifaRequest;
use Illuminate\Support\Facades\Validator;

class OtrasTarifaController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoria' => 'required|string|max:20',
            'orden' => 'required|integer|min:0',
            'name' => 'required|string|max:300',
            'codigo' => 'required|string|max:50',
            'valor' => 'required|integer|min:0',
            'id_usuario_admin' => 'required|exists:usuarios_admin_datos,usuario_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // 🔁 Soft delete de registros anteriores con misma categoria y codigo
            OtrasTarifa::where('categoria', $request->categoria)
                ->where('codigo', $request->codigo)
                ->whereNull('deleted_at')
                ->update(['deleted_at' => now()]);

            // 🆕 Crear nueva tarifa
            $tarifa = OtrasTarifa::create($validator->validated());

            return response()->json([
                'success' => true,
                'data' => $tarifa,
                'message' => 'Tarifa registrada correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar la tarifa',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function index()
{
    $tarifas = OtrasTarifa::whereNull('deleted_at')->get();

    return response()->json([
        'success' => true,
        'data' => $tarifas
    ]);
}


}
