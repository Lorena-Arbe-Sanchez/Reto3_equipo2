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
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_ciudadano');
            $table->foreign('id_actividad')
                ->references('id')
                ->on('actividades')
                ->onDelete('cascade');
            $table->foreign('id_ciudadano')
                ->references('id')
                ->on('ciudadanos')
                ->onDelete('cascade');
            $table->timestamps();
            $table->primary(['id_actividad', 'id_ciudadano']);
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
