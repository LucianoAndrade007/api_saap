<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Agua\RegistroConsumo;

class UsuarioClienteDato extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios_cliente_datos';
    protected $primaryKey = 'usuario_id';
    public $incrementing = false;

    protected $fillable = [
        'usuario_id',
        'alias',
        'giro',
        'direccion',
        'numero_casa',
        'ciudad',
        'numero_cliente',
        'factura',
        'subsidio_apr',
        'tipo_cliente_id',
        'id_ruta',
        'subsidio_municipal',
        'porcentaje_desc_municipal',
        'mcs_desc_municipal',
        'fijos_desc_municipal',
        'numero_resolucion',
        'puntaje_ficha',
        'fecha_encuesta',
        'numunico',
        'dv_numunico',
        'fecha_inicio',
        'fecha_termino',
    ];

    protected $casts = [
        'factura' => 'boolean',
        'subsidio_apr' => 'boolean',
        'subsidio_municipal' => 'boolean',
        'fecha_encuesta' => 'date',
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
    ];

    // Relaciones (si las necesitas más adelante)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }
    
    public function ultimaLectura()
    {
        return $this->hasOne(RegistroConsumo::class, 'usuario_id', 'usuario_id')
                    ->latestOfMany('fecha_lectura');
    }
}
