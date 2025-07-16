<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receptor extends Model
{
    use SoftDeletes;
    protected $table = 'receptores';

    protected $fillable = [
        'run',
        'razon_social',
        'actividad_comercial',
        'direccion',
        'comuna_id',
        'usuario_id'
    ];

    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }

    public function usuarioClienteDato()
    {
        return $this->belongsTo(UsuarioClienteDato::class, 'usuario_id', 'usuario_id');
    }

}
