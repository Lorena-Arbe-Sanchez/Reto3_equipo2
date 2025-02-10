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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('idioma');
            $table->string('horario');
            $table->integer('plazas_totales');
            $table->integer('plazas_disponibles');
            $table->integer('plazas_min');
            $table->integer('edad_min')->nullable();
            $table->integer('edad_max')->nullable();
            $table->integer('dia_1');
            $table->integer('dia_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
