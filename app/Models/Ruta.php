<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruta extends Model
{
    use SoftDeletes;

    protected $table = 'rutas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];
}
