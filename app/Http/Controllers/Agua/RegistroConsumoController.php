<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Models\Agua\RegistroConsumo;
use Illuminate\Http\Request;
use App\Services\ConsumoService;
use App\Http\Requests\StoreRegistroConsumoRequest;


class RegistroConsumoController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => RegistroConsumo::latest()->get()
        ]);
    }

    public function store(StoreRegistroConsumoRequest $request, ConsumoService $service)
    {
        \Log::info('Datos recibidos:', $request->all());
        $data = $request->validated();

        // Agregamos campos que vienen de sesión o se generan automáticamente
        $data['lectura_enviada'] = $data['lectura_enviada'] ?? true;

        //\Log::info('RegistroConsumoController/Store', $data);
        $ok = $service->registrarConsumo($data);

        if ($ok) {
            return response()->json([
                'message' => 'Lectura registrada correctamente.'
            ], 201);
        }

        return response()->json([
            'message' => 'Hubo un problema al registrar la lectura.'
        ], 500);
    }
    
    public function show(RegistroConsumo $consumo)
    {
        return response()->json(['data' => $consumo]);
    }

    public function update(Request $request, RegistroConsumo $consumo)
    {
        $consumo->update($request->all());

        return response()->json([
            'message' => 'Lectura actualizada',
            'data' => $consumo
        ]);
    }

    public function destroy(RegistroConsumo $consumo)
    {
        $consumo->delete();

        return response()->json(['message' => 'Lectura eliminada']);
    }

    public function lecturasPorUsuarioYMedidor($usuario_id, $medidor_id)
    {
        $lecturas = RegistroConsumo::where('usuario_id', $usuario_id)
            ->where('medidor_id', $medidor_id)
            ->orderBy('fecha_lectura', 'desc')
            ->get();

        return response()->json(['data' => $lecturas]);
    }


}
