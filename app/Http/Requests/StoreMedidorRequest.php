<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedidorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'usuario_id' => ['required', 'exists:usuarios,id'],
            'tipo_medidor_id' => ['nullable', 'exists:tipos_medidor,id'],
            'alcantarillado' => ['nullable', 'boolean'],
            'codigo' => ['required', 'string', 'max:100', 'unique:medidores,codigo'],
            'codigo_casa' => ['nullable', 'string', 'max:20'],
            'activo' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'usuario_id.required' => 'El campo usuario es obligatorio.',
            'usuario_id.exists' => 'El usuario seleccionado no existe.',
            'tipo_medidor_id.exists' => 'El tipo de medidor seleccionado no existe.',
            'codigo.required' => 'El código del medidor es obligatorio.',
            'codigo.unique' => 'El código ya está en uso.',
        ];
    }
}
