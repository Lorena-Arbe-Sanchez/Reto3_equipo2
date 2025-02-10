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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable(false);
            $table->string('apellidos', 255)->nullable(false);
            $table->string('dni', 9)->nullable(false);
            $table->string('direccion', 255)->nullable(false);
            $table->string('codigo_postal', 5)->nullable(false);
            $table->string('usuario', 20)->nullable(false);
            $table->string('password', 20)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
