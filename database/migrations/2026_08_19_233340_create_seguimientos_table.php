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
        Schema::create('seguimientos', function (Blueprint $table) {

            $table->id();

            // Cliente al que pertenece el seguimiento
            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->cascadeOnDelete();

            // Fecha del registro
            $table->date('fecha');

            // Datos corporales
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 4, 2)->nullable();

            // Medidas corporales
            $table->decimal('pecho', 5, 2)->nullable();
            $table->decimal('cintura', 5, 2)->nullable();
            $table->decimal('cadera', 5, 2)->nullable();
            $table->decimal('brazo', 5, 2)->nullable();
            $table->decimal('muslo', 5, 2)->nullable();

            // Observaciones
            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};