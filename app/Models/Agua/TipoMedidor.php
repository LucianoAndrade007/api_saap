<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMedidor extends Model
{
    use SoftDeletes;

    protected $table = 'tipos_medidor';

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
