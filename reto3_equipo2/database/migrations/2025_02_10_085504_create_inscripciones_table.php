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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->bigInteger('id_ciudadano')->unsigned();
            $table->bigInteger('id_actividad')->unsigned();
            $table->timestamps();
            $table->primary(['id_ciudadano', 'id_actividad']);
            $table->foreign('id_ciudadano')
                ->references('id')
                ->on('ciudadanos');
            $table->foreign('id_actividad')
                ->references('id')
                ->on('actividades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
