<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRol extends Model
{
    use HasFactory;

    protected $table = 'admin_roles'; // ← importante si el modelo no sigue el plural automático de Laravel

    protected $fillable = [
        'nombre_rol',
        'descripcion',
        'nivel',
    ];
}
