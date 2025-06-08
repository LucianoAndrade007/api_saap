<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaUsuario extends Model
{
    use SoftDeletes;

    protected $table = 'categorias_usuarios';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = true;
}
