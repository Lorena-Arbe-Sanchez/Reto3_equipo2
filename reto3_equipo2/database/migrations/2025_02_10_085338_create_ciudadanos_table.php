<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ciudadanos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable(false);
            $table->string('apellidos', 255)->nullable(false);
            $table->string('dni', 9)->unique()->nullable(false);
            $table->string('direccion', 255)->nullable(false);
            $table->string('codigo_postal', 5)->nullable(false);

            // No hay que guardar el "codigo_tmc" ya que es igual que el DNI.
            //$table->string('codigo_tmc', 10)->unique()->nullable(false);

            // Para identificarse con el juego de barcos (cada dígito numérico asociado a una letra en el reverso de la TMC).
            $table->string('juego_barcos', 16)->unique()->nullable(false);

            $table->timestamps();
        });

        // Agregar CK para que el DNI solo permita su patrón.
        DB::statement("ALTER TABLE ciudadanos ADD CONSTRAINT CIUDA_DNI_CK CHECK (dni REGEXP '^[0-9]{8}[A-Z]$')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la CK explícitamente.
        DB::statement('ALTER TABLE ciudadanos DROP CONSTRAINT IF EXISTS CIUDA_DNI_CK');

        Schema::dropIfExists('ciudadanos');
    }
};
