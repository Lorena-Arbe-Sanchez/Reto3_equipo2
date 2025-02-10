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
        Schema::create('centros_civicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable(false);
            $table->string('telefono', 9)->nullable(false);
            $table->string('correo', 255)->nullable(false);
            $table->string('direccion', 255)->nullable(false);
            $table->string('codigo_postal', 5)->nullable(false);
            $table->string('imagen', 350)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros_civicos');
    }
};
