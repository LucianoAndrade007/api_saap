<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroConsumoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'medidor_id' => 'required|integer',
            'usuario_id' => 'required|exists:usuarios,id',
            'consumo' => 'required|numeric',
            'costo_reposicion_servicio' => 'nullable|numeric',
            'multa_intervencion_servicio' => 'nullable|numeric',
            'fecha_lectura' => 'required|date',
            'foto' => 'nullable|string',
            'comentarios' => 'nullable|string|max:300',
            'origen' => 'nullable|string|max:50',
            'administrador_id' => ['required', 'exists:usuarios_admin_datos,usuario_id']
        ];
    }
}
