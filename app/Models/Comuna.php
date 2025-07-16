<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comuna extends Model
{
    use SoftDeletes;

    protected $table = 'comunas';

    protected $fillable = [
        'nombre',
        'region_id',
    ];

    protected $dates = [
        'deleted_at',
    ];

    // Relaciones
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function receptores()
    {
        return $this->hasMany(Receptor::class);
    }
}
