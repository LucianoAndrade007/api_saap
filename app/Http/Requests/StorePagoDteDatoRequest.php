<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagoDteDatoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero_folio' => 'required|integer|min:1',
            'timbre' => 'nullable|string',
            'numero_resolucion' => 'nullable|integer|min:0',
            'fecha_resolucion' => 'nullable|date',
            'token' => 'nullable|string',
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // hasta 10MB
            'es_visible' => 'nullable|boolean',
        ];
    }
}
