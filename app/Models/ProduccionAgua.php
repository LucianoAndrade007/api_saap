<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduccionAgua extends Model
{
    use HasFactory;

    protected $table = 'lista_produccion_agua';

    protected $fillable = [
        'fecha',
        'litros_producidos',
        'litros_consumidos',
        'presion',
        'turno',
        'observacion',
        'usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
