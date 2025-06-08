<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'claims';

    protected $fillable = [
        'user_id',
        'claim_type_id',
        'descripcion',
        'fecha',
        'estado',
    ];

    public function tipo()
    {
        return $this->belongsTo(TipoReclamo::class, 'claim_type_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
