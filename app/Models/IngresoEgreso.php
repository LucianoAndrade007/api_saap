<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoEgreso extends Model
{
    use HasFactory;

    protected $table = 'ingresoegreso';

    protected $fillable = [
        'tipo',
        'monto',
        'descripcion',
        'fecha',
        'user_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
