<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoReclamo extends Model
{
    protected $table = 'claim_types'; // tabla original sigue en inglés

    protected $fillable = ['name', 'status'];
    protected $primaryKey = 'id_claims_type'; // usa el nombre real de tu campo

    public $timestamps = false;


    public function reclamos()
    {
        return $this->hasMany(Reclamo::class, 'claim_type_id');
    }
}
