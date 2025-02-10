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
            $table->string('titulo', 20)->nullable(false);
            $table->string('descripcion', 300)->nullable(false);
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_fin')->nullable(false);
            $table->char('dia_1', 1)->nullable(false);
            $table->char('dia_2', 1)->nullable(true);
            $table->string('horario', 255)->nullable(false);
            $table->string('idioma', 15)->nullable(false);
            $table->integer('plazas_totales')->nullable(false);
            $table->integer('plazas_disponibles')->nullable(false);
            $table->integer('plazas_minimas')->nullable(false);
            $table->integer('edad_minima')->nullable(true);
            $table->integer('edad_maxima')->nullable(true);
            $table->string('imagen', 350)->nullable(true);
            $table->unsignedBigInteger('administrador_id')->nullable(false);
            $table->foreign('administrador_id')
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
