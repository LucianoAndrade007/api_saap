<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medidor extends Model
{
    use SoftDeletes;

    protected $table = 'medidores';

    protected $fillable = [
        'usuario_id',
        'tipo_medidor_id',
        'alcantarillado',
        'codigo',
        'codigo_casa',
        'activo',
        'fecha_creacion',
    ];

    protected $casts = [
        'alcantarillado' => 'boolean',
        'activo' => 'boolean',
        'fecha_creacion' => 'datetime',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function tipoMedidor()
    {
        return $this->belongsTo(TipoMedidor::class, 'tipo_medidor_id');
    }
}
