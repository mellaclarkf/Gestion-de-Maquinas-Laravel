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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maquina_id')->constrained('maquinas')->onDelete('cascade');
            $table->foreignId('produccion_id')->nullable()->constrained('producciones')->onDelete('set null');
            $table->dateTime('fecha_hora_inicio');
            $table->dateTime('fecha_hora_termino');
            $table->decimal('tiempo_empleado', 5, 2);
            $table->decimal('tiempo_produccion', 5, 2)->nullable();
            $table->enum('estado', ['PENDIENTE', 'COMPLETADA'])->default('PENDIENTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
