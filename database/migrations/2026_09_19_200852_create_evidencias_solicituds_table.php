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
        Schema::create('evidencias_solicituds', function (Blueprint $table) {
            $table->id();
        $table->foreignId('servicio_id')->constrained('servicio_solicitados')->onDelete('cascade');
        $table->string('ruta_imagen', 255);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencias_solicituds');
    }
};
