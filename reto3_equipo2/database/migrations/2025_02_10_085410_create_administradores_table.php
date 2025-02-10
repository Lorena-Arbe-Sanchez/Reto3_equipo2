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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable(false);
            $table->string('apellidos', 255)->nullable(false);
            $table->string('dni', 9)->unique()->nullable(false);
            $table->string('direccion', 255)->nullable(false);
            $table->string('codigo_postal', 5)->nullable(false);
            $table->string('usuario', 20)->unique()->nullable(false);
            $table->string('password', 20)->nullable(false);
            $table->timestamps();

            // Crear un índice compuesto (para las consultas frecuentes) para las columnas 'usuario' y 'password'.
            $table->index(['usuario', 'password'], 'index_login');
        });

        // Agregar CK para que el DNI solo permita su patrón.
        DB::statement("ALTER TABLE administradores ADD CONSTRAINT ADMIN_DNI_CK CHECK (dni REGEXP '^[0-9]{8}[A-Z]$')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administradores', function (Blueprint $table) {
            // Eliminar el índice compuesto.
            $table->dropIndex('index_login');
        });

        // Eliminar la CK explícitamente.
        DB::statement('ALTER TABLE administradores DROP CONSTRAINT IF EXISTS ADMIN_DNI_CK');

        Schema::dropIfExists('administradores');
    }
};
