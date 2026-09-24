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
        Schema::create('perfil_tecnicos', function (Blueprint $table) {
           $table->id();
    $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
    $table->string('documento_identidad', 50)->unique();
    $table->string('tarjeta_profesional', 50)->nullable();
    $table->enum('estado_validacion', ['Pendiente', 'Aprobado', 'Rechazado'])->default('Pendiente');
    $table->decimal('precio_minimo_estimado', 10, 2)->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_tecnicos');
    }
};
