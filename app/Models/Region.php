<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    protected $table = 'regiones';

    protected $fillable = [
        'nombre',
        'codigo',
    ];

    protected $dates = [
        'deleted_at',
    ];

    // Relaciones
    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }
}
