<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Models\Agua\Pago;
use Illuminate\Http\Request;
use App\Http\Requests\StorePagosRequest;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::latest()->paginate(20);
        return response()->json($pagos);
    }

    public function store(StorePagosRequest $request)
    {
        $pago = Pago::create($request->validated());
        return response()->json($pago, 201);
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return response()->json(['message' => 'Pago eliminado correctamente.']);
    }

    public function generarDesdeConsumo(Request $request)
    {
        $dataConsumo = $request->input('consumo');
        $tarifas = $request->input('tarifas');

        $pago = $this->pagoService->generarPagoDesdeConsumo($dataConsumo, $tarifas, $tarifas); //Corregir

        return response()->json($pago, 201);
    }
}
