<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedidorRequest;
use App\Http\Requests\UpdateMedidorRequest;
use App\Models\Agua\Medidor;
use Illuminate\Http\JsonResponse;

class MedidorController extends Controller
{
    public function index(): JsonResponse
    {
        $medidores = Medidor::latest()->get();

        return response()->json([
            'data' => $medidores
        ]);
    }

    public function store(StoreMedidorRequest $request): JsonResponse
    {
        $medidor = Medidor::create($request->validated());

        return response()->json([
            'message' => 'Medidor creado correctamente.',
            'data' => $medidor
        ], 201);
    }

    public function show(Medidor $medidore): JsonResponse
    {
        return response()->json([
            'data' => $medidore
        ]);
    }

    public function update(UpdateMedidorRequest $request, Medidor $medidore): JsonResponse
    {
        $medidore->update($request->validated());

        return response()->json([
            'message' => 'Medidor actualizado correctamente.',
            'data' => $medidore
        ]);
    }

    public function destroy(Medidor $medidore): JsonResponse
    {
        $medidore->delete();

        return response()->json([
            'message' => 'Medidor eliminado correctamente.'
        ]);
    }
}
