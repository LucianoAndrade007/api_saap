<?php

namespace App\Models\Agua;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagosDteDato extends Model
{
    use SoftDeletes;

    protected $table = 'pagos_dte_datos';

    protected $fillable = [
        'numero_folio',
        'timbre',
        'numero_resolucion',
        'fecha_resolucion',
        'token',
        'pdf',
        'es_visible',
    ];

    protected $casts = [
        'fecha_resolucion' => 'date',
        'es_visible' => 'boolean',
    ];
}