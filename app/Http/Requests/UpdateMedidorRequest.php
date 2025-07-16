<?php

namespace App\Http\Requests\Medidores;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedidorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $medidorId = $this->route('medidores'); // según cómo esté nombrada la ruta en el Route::apiResource()

        return [
            'usuario_id' => ['sometimes', 'exists:usuarios,id'],
            'tipo_medidor_id' => ['nullable', 'exists:tipos_medidor,id'],
            'alcantarillado' => ['nullable', 'boolean'],
            'codigo' => ['sometimes', 'string', 'max:100', "unique:medidores,codigo,{$medidorId}"],
            'codigo_casa' => ['nullable', 'string', 'max:20'],
            'activo' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'usuario_id.exists' => 'El usuario seleccionado no existe.',
            'tipo_medidor_id.exists' => 'El tipo de medidor seleccionado no existe.',
            'codigo.unique' => 'El código ya está en uso.',
        ];
    }
}
