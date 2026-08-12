<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'nombre',
        'descripcion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function ejercicios()
    {
        return $this->hasMany(RutinaEjercicio::class);
    }
}