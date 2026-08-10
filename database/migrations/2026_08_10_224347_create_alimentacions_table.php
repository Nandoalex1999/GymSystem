<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar la migración.
     */
    public function up(): void
    {
        Schema::create('alimentaciones', function (Blueprint $table) {

            $table->id();

            // Cliente al que pertenece el plan alimenticio
            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->onDelete('cascade');

            $table->string('nombre_plan');

            $table->string('objetivo');

            $table->integer('calorias')->nullable();

            $table->text('desayuno')->nullable();

            $table->text('almuerzo')->nullable();

            $table->text('merienda')->nullable();

            $table->text('cena')->nullable();

            $table->text('observaciones')->nullable();

            $table->boolean('estado')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentaciones');
    }
};