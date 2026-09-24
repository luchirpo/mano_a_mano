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
        Schema::create('servicio_solicitados', function (Blueprint $table) {
            $table->id();
    $table->foreignId('cliente_id')->constrained('users');
    $table->foreignId('categoria_id')->constrained('categorias_servicios');
    $table->foreignId('tecnico_id')->nullable()->constrained('perfil_tecnicos');
    $table->text('descripcion_falla');
    $table->dateTime('fecha_hora_programada')->nullable();
    $table->enum('estado_servicio', ['Solicitado', 'Cotizado', 'Programado', 'En Ejecución', 'Finalizado', 'Cancelado'])->default('Solicitado');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_solicitados');
    }
};
