<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Receptor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceptorRequest;
use App\Http\Requests\UpdateReceptorRequest;

class ReceptoresController extends Controller
{
    public function index()
    {
        return Receptor::with(['comuna', 'usuarioClienteDato'])->latest()->get();
    }

    public function store(StoreReceptorRequest $request)
    {
        $receptor = Receptor::create($request->validated());
        return response()->json($receptor, 201);
    }

    public function show(Receptor $receptor)
    {
        return $receptor->load(['comuna', 'usuarioClienteDato']);
    }

    public function update(UpdateReceptorRequest $request, Receptor $receptor)
    {
        $receptor->update($request->validated());
        return response()->json($receptor);
    }

    public function destroy(Receptor $receptor)
    {
        $receptor->delete();
        return response()->json(null, 204);
    }

}

