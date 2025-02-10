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
            $table->integer('dia_1');
            $table->integer('dia_2')->nullable();
            $table->string('horario');
            $table->string('idioma');
            $table->integer('plazas_totales');
            $table->integer('plazas_disponibles');
            $table->integer('plazas_minimas');
            $table->integer('edad_minima')->nullable();
            $table->integer('edad_maxima')->nullable();
            $table->string('imagen')->nullable();
            $table->bigInteger('id_administrador')->unsigned();
            $table->foreign('id_administrador')
                ->references('id')
                ->on('administradores');
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
