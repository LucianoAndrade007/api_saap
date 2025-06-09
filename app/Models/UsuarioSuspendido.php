<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioSuspendido extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios_suspendidos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
        'motivo',
        'fecha_suspension',
        'estado',
        'creado_por',
        'modificado_por',
    ];
}
