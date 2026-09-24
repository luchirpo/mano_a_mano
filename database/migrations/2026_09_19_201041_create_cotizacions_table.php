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
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_solicitado_id')->constrained('servicio_solicitados');
            $table->foreignId('tecnico_id')->constrained('perfil_tecnicos');
            $table->decimal('costo_mano_obra', 10, 2);
            $table->decimal('costo_materiales', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->dateTime('fecha_oferta');
            $table->enum('estado_cotizacion', ['Pendiente', 'Aceptada', 'Rechazada'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
