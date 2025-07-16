<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarifaRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Cambia a true si no usas políticas
        return true;
    }

    public function rules(): array
    {
        return [
            'categorias_usuarios_id' => 'nullable|exists:categorias_usuarios,id',
            'tipos_medidor_id' => 'nullable|exists:tipos_medidor,id',
            'c_f_agua' => 'required|integer|min:0',
            'c_f_alcan' => 'required|integer|min:0',
            'm3_agua' => 'required|integer|min:0',
            'm3_alcan' => 'required|integer|min:0',
            'actualizado_por_id' => 'required|exists:usuarios_admin_datos,usuario_id',
        ];
    }
}
