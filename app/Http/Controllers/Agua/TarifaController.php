<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Models\Agua\Tarifa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTarifaRequest;

class TarifaController extends Controller
{

    public function store(StoreTarifaRequest $request)
    {
        $data = $request->validated();

        // Buscar tarifa existente activa con la misma categoría y tipo de medidor
        $tarifaAnterior = Tarifa::where('categorias_usuarios_id', $data['categorias_usuarios_id'])
            ->where('tipos_medidor_id', $data['tipos_medidor_id'])
            ->whereNull('deleted_at')
            ->first();

        if ($tarifaAnterior) {
            $tarifaAnterior->delete(); // SoftDelete
        }

        // Crear nueva tarifa
        $tarifa = Tarifa::create($data);

        return response()->json($tarifa, 201);
    }

    public function agrupadas()
    {
        $tarifas = Tarifa::whereNull('deleted_at')
            ->with(['categoriaUsuario:id,nombre', 'tipoMedidor:id,nombre'])
            ->get()
            ->map(function ($tarifa) {
                return [
                    'id' => $tarifa->id,
                    'categorias_usuarios_id' => $tarifa->categorias_usuarios_id,
                    'tipos_medidor_id' => $tarifa->tipos_medidor_id,
                    'c_f_agua' => $tarifa->c_f_agua,
                    'c_f_alcan' => $tarifa->c_f_alcan,
                    'm3_agua' => $tarifa->m3_agua,
                    'm3_alcan' => $tarifa->m3_alcan,
                    'actualizado_por_id' => $tarifa->actualizado_por_id,
                    'created_at' => $tarifa->created_at,
                    'updated_at' => $tarifa->updated_at,
                    'categoria_nombre' => trim($tarifa->categoriaUsuario->nombre ?? 'Sin categoría'),
                    'medidor_nombre' => trim($tarifa->tipoMedidor->nombre ?? 'Sin medidor'),
                ];
            })
            ->sortBy([
                fn($a, $b) => strcmp($a['categoria_nombre'], $b['categoria_nombre']),
                fn($a, $b) => strcmp($a['medidor_nombre'], $b['medidor_nombre']),
            ])
            ->groupBy([
                fn($item) => $item['categoria_nombre'],
                fn($item) => $item['medidor_nombre'],
            ]);

        return response()->json($tarifas);
    }




}
