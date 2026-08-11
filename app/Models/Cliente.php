<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'correo',
        'direccion',
        'altura',
        'peso_actual',
        'objetivo',
        'estado',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'altura' => 'decimal:2',
        'peso_actual' => 'decimal:2',
        'estado' => 'boolean',
    ];

    public function alimentaciones()
    {
        return $this->hasMany(Alimentacion::class);
    }
}