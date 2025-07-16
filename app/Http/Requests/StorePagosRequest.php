<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Si usas políticas, cámbialo según corresponda
    }

    public function rules(): array
    {
        return [
            'consumo_id' => 'required|exists:registros_consumos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo_usuario_id' => 'required|integer',
            'tipo_medidor_id' => 'required|integer',
            'fecha_lectura_anterior' => 'required|date',
            'fecha_lectura_actual' => 'required|date|after_or_equal:fecha_lectura_anterior',
            'medicion_anterior' => 'required|integer|min:0',
            'medicion_actual' => 'required|integer|min:0',
            'm3_consumidos' => 'required|integer|min:0',
            'valor_m3_agua' => 'required|integer|min:0',
            'valor_m3_alcantarillado' => 'required|integer|min:0',
            'valor_fijo_alcantarillado' => 'nullable|integer|min:0',
            'valor_fijo_agua' => 'nullable|integer|min:0',
            'valor_mensual_agua' => 'nullable|integer|min:0',
            'valor_mensual_alcantarillado' => 'nullable|integer|min:0',
            'total_consumo_agua_alcantarillado' => 'nullable|integer|min:0',
            'total_fijo_agua_alcantarillado' => 'nullable|integer|min:0',
            'total_sin_descuento' => 'nullable|integer|min:0',
            'descuento_subsidio' => 'nullable|integer|min:0',
            'descuento_convenio_apr' => 'nullable|integer|min:0',
            'iva' => 'nullable|integer|min:0',
            'multa_intervencion_servicio' => 'nullable|integer|min:0',
            'costo_reposicion_servicio' => 'nullable|integer|min:0',
            'monto_total' => 'required|integer|min:0',
            'estado_id' => 'nullable|integer|min:0',
            'fecha_pago' => 'nullable|date',
            'metodo_pago_id' => 'nullable|exists:metodos_pago,id',
            'pago_habilitado' => 'nullable|boolean',
            'deuda_pendiente' => 'nullable|integer|min:0',
            'monto_convenio' => 'nullable|integer|min:0',
            'numero_cuota' => 'nullable|integer|min:0',
            'numero_ingreso' => 'nullable|integer|min:0',
            'estado_moroso' => 'nullable|boolean',
            'origen' => 'nullable|string|max:50',
            'porcentaje_sobreconsumo' => 'nullable|numeric|min:0',
            'limite_m3_consumo' => 'nullable|integer|min:0',
            'm3_sobreconsumo' => 'nullable|integer|min:0',
            'total_sobreconsumo' => 'nullable|integer|min:0',
        ];
    }
}
