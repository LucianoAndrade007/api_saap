<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Agua\PagoDteDato;

class Pago extends Model
{
    use SoftDeletes;

    protected $table = 'pagos';

    protected $fillable = [
        'consumo_id',
        'usuario_id',
        'tipo_usuario_id',
        'tipo_medidor_id',
        'fecha_lectura_anterior',
        'fecha_lectura_actual',
        'medicion_anterior',
        'medicion_actual',
        'm3_consumidos',
        'valor_m3_agua',
        'valor_m3_alcantarillado',
        'valor_fijo_alcantarillado',
        'valor_fijo_agua',
        'valor_mensual_agua',
        'valor_mensual_alcantarillado',
        'total_consumo_agua_alcantarillado',
        'total_fijo_agua_alcantarillado',
        'total_sin_descuento',
        'descuento_subsidio',
        'descuento_convenio_apr',
        'iva',
        'multa_intervencion_servicio',
        'costo_reposicion_servicio',
        'monto_total',
        'estado_id',
        'fecha_pago',
        'metodo_pago_id',
        'pago_habilitado',
        'deuda_pendiente',
        'monto_convenio',
        'numero_cuota',
        'numero_ingreso',
        'estado_moroso',
        'origen',
        'porcentaje_sobreconsumo',
        'limite_m3_consumo',
        'm3_sobreconsumo',
        'total_sobreconsumo',
    ];

    protected $casts = [
        'fecha_lectura_anterior' => 'datetime',
        'fecha_lectura_actual' => 'datetime',
        'fecha_pago' => 'datetime',
        'pago_habilitado' => 'boolean',
        'estado_moroso' => 'boolean',
    ];

    public function dteDatos() {
        return $this->hasOne(PagoDteDato::class);
    }
}