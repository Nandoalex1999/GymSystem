<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->id();

            $table->string('cedula', 20)->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');

            $table->enum('sexo', ['Masculino', 'Femenino']);

            $table->string('telefono', 20);
            $table->string('correo')->unique();
            $table->string('direccion');

            $table->decimal('altura', 4, 2);
            $table->decimal('peso_actual', 5, 2);

            $table->string('objetivo');

            $table->boolean('estado')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};