<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RutinaEjercicio extends Model
{
    protected $table = 'rutina_ejercicios';

    protected $fillable = [
        'rutina_id',
        'ejercicio_id',
        'series',
        'repeticiones',
        'descanso',
        'orden',
        'observaciones',
    ];

    public function rutina()
    {
        return $this->belongsTo(Rutina::class);
    }

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class);
    }
}