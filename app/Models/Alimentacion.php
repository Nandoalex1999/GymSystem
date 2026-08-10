<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Alimentacion extends Model
{
    protected $table = 'alimentaciones';

    protected $fillable = [
        'cliente_id',
        'nombre_plan',
        'objetivo',
        'calorias',
        'desayuno',
        'almuerzo',
        'merienda',
        'cena',
        'observaciones',
        'estado',
    ];

    protected $casts = [
        'calorias' => 'integer',
        'estado' => 'boolean',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}