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

    public function alimentaciones()
    {
        return $this->hasMany(Alimentacion::class);
    }
}