<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CategoriaUsuario;
use App\Models\UsuarioAdminDato;

class Tarifa extends Model
{
    use SoftDeletes;

    protected $table = 'tarifas';

    protected $fillable = [
        'categorias_usuarios_id',
        'tipos_medidor_id',
        'c_f_agua',
        'c_f_alcan',
        'm3_agua',
        'm3_alcan',
        'actualizado_por_id',
    ];

    // Relaciones
    public function categoriaUsuario()
    {
        return $this->belongsTo(CategoriaUsuario::class, 'categorias_usuarios_id');
    }

    public function tipoMedidor()
    {
        return $this->belongsTo(TipoMedidor::class, 'tipos_medidor_id');
    }

    public function adminActualizador()
    {
        return $this->belongsTo(UsuarioAdminDato::class, 'actualizado_por_id');
    }
}
