<?php

namespace App\Http\Controllers\Agua;

use App\Http\Controllers\Controller;
use App\Models\Agua\PagoDteDato;
use Illuminate\Http\Request;
use App\Http\Requests\StorePagoDteDatoRequest;

class PagoDteDatosController extends Controller
{
    public function index()
    {
        $datos = PagoDteDato::latest()->paginate(20);
        return response()->json($datos);
    }

    public function store(StorePagoDteDatoRequest $request)
    {
        $dato = PagoDteDato::create($request->validated());
        return response()->json($dato, 201);
    }

    public function show($id)
    {
        $dato = PagoDteDato::findOrFail($id);
        return response()->json($dato);
    }

    public function destroy($id)
    {
        $dato = PagoDteDato::findOrFail($id);
        $dato->delete();
        return response()->json(['message' => 'Dato DTE eliminado correctamente.']);
    }
}

