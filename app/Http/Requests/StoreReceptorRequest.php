<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceptorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'run' => 'required|string|max:20|unique:receptores,run',
            'razon_social' => 'required|string|max:200',
            'actividad_comercial' => 'required|string|max:200',
            'direccion' => 'required|string|max:255',
            'comuna_id' => 'required|exists:comunas,id',
            'usuario_id' => 'required|exists:usuarios_cliente_datos,usuario_id'
        ];
    }

    public function wantsJson()
    {
        return true;
    }


}
