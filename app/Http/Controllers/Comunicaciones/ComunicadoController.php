<?php

namespace App\Http\Controllers\Comunicaciones;

use App\Http\Controllers\Controller;
use App\Models\Comunicado;
use Illuminate\Http\Request;

class ComunicadoController extends Controller
{
    public function index()
    {
        return Comunicado::where('visible', true)->orderBy('fecha', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:150',
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'visible' => 'boolean',
        ]);

        return Comunicado::create($data);
    }

    public function show($id)
    {
        return Comunicado::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $comunicado = Comunicado::findOrFail($id);

        $data = $request->validate([
            'titulo' => 'sometimes|string|max:150',
            'contenido' => 'sometimes|string',
            'fecha' => 'sometimes|date',
            'visible' => 'boolean',
        ]);

        $comunicado->update($data);

        return $comunicado;
    }

    public function destroy($id)
    {
        Comunicado::findOrFail($id)->delete();
        return response()->json(['message' => 'Comunicado eliminado']);
    }
}
