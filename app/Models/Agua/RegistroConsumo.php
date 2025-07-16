<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Agua\Medidor;
use App\Models\User;

class RegistroConsumo extends Model
{
    use SoftDeletes;

    protected $table = 'registros_consumos';

    protected $fillable = [
        'medidor_id',
        'usuario_id',
        'consumo',
        'costo_reposicion_servicio',
        'multa_intervencion_servicio',
        'fecha_lectura',
        'foto',
        'comentarios',
        'lectura_enviada',
        'administrador_id',
    ];

    protected $casts = [
        'lectura_enviada' => 'boolean',
        'fecha_lectura' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function medidor()
    {
        return $this->belongsTo(Medidor::class, 'medidor_id');
    }
}
