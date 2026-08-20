<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    /**
     * Campos que pueden asignarse masivamente.
     */
    protected $fillable = [
        'cliente_id',
        'fecha',
        'peso',
        'altura',
        'pecho',
        'cintura',
        'cadera',
        'brazo',
        'pierna',
        'observaciones',
    ];

    /**
     * Conversión de tipos de datos.
     */
    protected $casts = [
        'fecha' => 'date',
        'peso' => 'decimal:2',
        'altura' => 'decimal:2',
        'pecho' => 'decimal:2',
        'cintura' => 'decimal:2',
        'cadera' => 'decimal:2',
        'brazo' => 'decimal:2',
        'pierna' => 'decimal:2',
    ];

    /**
     * Cliente al que pertenece este seguimiento.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}