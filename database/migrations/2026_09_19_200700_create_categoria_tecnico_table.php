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
        Schema::create('categoria_tecnico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained('perfil_tecnicos')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias_servicios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_tecnicos');
    }
};
