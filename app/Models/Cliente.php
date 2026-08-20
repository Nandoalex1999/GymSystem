<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * Campos que pueden asignarse masivamente.
     */
    protected $fillable = [
        'user_id',
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

    /**
     * Conversión de tipos de datos.
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
        'altura' => 'decimal:2',
        'peso_actual' => 'decimal:2',
        'estado' => 'boolean',
    ];

    /**
     * Usuario asociado al cliente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Rutinas asignadas al cliente.
     */
    public function rutinas()
    {
        return $this->hasMany(Rutina::class);
    }

    /**
     * Planes de alimentación del cliente.
     */
    public function alimentaciones()
    {
        return $this->hasMany(Alimentacion::class);
    }

    /**
     * Registros de seguimiento corporal del cliente.
     */
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }
}