<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReceptorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // o tu lógica de autorización
    }

    public function rules(): array
    {
        return [
            'run' => 'sometimes|string|max:12',
            'razon_social' => 'sometimes|string|max:255',
            'actividad_comercial' => 'sometimes|string|max:255',
            'direccion' => 'sometimes|string|max:255',
            'comuna_id' => 'sometimes|exists:comunas,id',
            'usuario_id' => 'sometimes|exists:usuarios_cliente_datos,usuario_id'
            ];
    }
}
