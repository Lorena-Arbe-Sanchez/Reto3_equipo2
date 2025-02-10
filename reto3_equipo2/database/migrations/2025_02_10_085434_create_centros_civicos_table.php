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

        // Agregar CK para que el teléfono solo permita números.
        DB::statement("ALTER TABLE centros_civicos ADD CONSTRAINT CENT_TELE_CK CHECK (telefono REGEXP '^[0-9]{9}$')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la CK explícitamente.
        DB::statement('ALTER TABLE centros_civicos DROP CONSTRAINT IF EXISTS CENT_TELE_CK');

        Schema::dropIfExists('centros_civicos');
    }
};
