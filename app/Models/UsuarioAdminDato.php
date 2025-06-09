<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioAdminDato extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios_admin_datos';
    protected $primaryKey = 'usuario_id';
    public $incrementing = false; // Porque no es autoincremental
    protected $keyType = 'int';

    protected $fillable = [
        'usuario_id',
        'imagen',
        'ultima_ip',
        'es_super',
        'token',
    ];

    protected $casts = [
        'es_super' => 'boolean',
    ];
}
