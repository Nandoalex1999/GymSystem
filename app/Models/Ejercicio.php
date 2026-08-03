<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ejercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'grupo_muscular',
        'descripcion',
    ];

    public function rutinas()
    {
        return $this->hasMany(RutinaEjercicio::class);
    }
}