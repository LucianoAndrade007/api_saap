<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioSuspendidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'estado' => 'required|boolean',
            'fecha_suspension' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'usuario_id.exists' => 'El usuario especificado no existe en el sistema.',
        ];
    }
    public function wantsJson()
    {
        return true;
    }

}
