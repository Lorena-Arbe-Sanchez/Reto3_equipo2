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
        Schema::create('actividad_centro', function (Blueprint $table) {
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_centro');
            $table->foreign('id_actividad')
                ->references('id')
                ->on('actividades');
            $table->foreign('id_centro')
                ->references('id')
                ->on('centros_civicos');
            $table->primary(['id_actividad', 'id_centro']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad_centro');
    }
};
