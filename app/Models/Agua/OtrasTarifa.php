<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UsuarioAdminDato;

class OtrasTarifa extends Model
{
    use SoftDeletes;

    protected $table = 'otras_tarifas';

    protected $fillable = [
        'categoria',
        'orden',
        'name',
        'codigo',
        'valor',
        'id_usuario_admin'
    ];

    // Relaciones

    public function adminActualizador()
    {
        return $this->belongsTo(UsuarioAdminDato::class, 'id_usuario_admin');
    }
}
