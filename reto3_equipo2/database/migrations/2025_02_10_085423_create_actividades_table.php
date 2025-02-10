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
            $table->string('descripcion', 255)->nullable(false);
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_fin')->nullable(false);
            $table->char('dia_1', 1)->nullable(false);
            $table->char('dia_2', 1)->nullable(true);
            $table->string('horario', 255)->nullable(false);
            $table->string('idioma', 15)->nullable(false);
            $table->integer('plazas_totales', 3)->nullable(false);
            $table->integer('plazas_disponibles', 3)->nullable(false);
            $table->integer('plazas_minimas', 3)->nullable(false);
            $table->integer('edad_minima', 3)->nullable(true);
            $table->integer('edad_maxima', 3)->nullable(true);
            $table->string('imagen', 350)->nullable(true);
            $table->unsignedBigInteger('id_administrador')->nullable(false);
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
