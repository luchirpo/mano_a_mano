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
        Schema::create('contacto_emergencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained('perfil_tecnicos')->onDelete('cascade');
            $table->string('nombre_contacto', 100);
            $table->string('telefono_contacto', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto_emergencias');
    }
};
