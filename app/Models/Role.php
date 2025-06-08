<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'guard_name',
        'creado_por',
        'modificado_por',
        'estado',
    ];

    protected $dates = ['deleted_at'];

    // Relaciones opcionales
    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function modificador()
    {
        return $this->belongsTo(User::class, 'modificado_por');
    }
}
