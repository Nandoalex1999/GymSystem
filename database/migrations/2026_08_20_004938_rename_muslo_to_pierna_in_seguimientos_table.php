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
        Schema::table('seguimientos', function (Blueprint $table) {
            $table->renameColumn('muslo', 'pierna');
        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::table('seguimientos', function (Blueprint $table) {
            $table->renameColumn('pierna', 'muslo');
        });
    }
};