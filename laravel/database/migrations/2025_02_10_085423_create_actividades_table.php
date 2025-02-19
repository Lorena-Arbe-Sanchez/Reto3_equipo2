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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 30)->nullable(false);
            $table->string('descripcion', 300)->nullable(false);
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_fin')->nullable(false);
            $table->char('dia_1', 1)->nullable(false);
            $table->char('dia_2', 1)->nullable(true);
            $table->string('hora_inicio', 5)->nullable(false);
            $table->string('hora_fin', 5)->nullable(false);
            $table->string('idioma', 15)->nullable(false);
            $table->integer('plazas_totales')->nullable(false);
            $table->integer('plazas_disponibles')->nullable(false);
            $table->integer('plazas_minimas')->nullable(false);
            $table->integer('edad_minima')->nullable(true);
            $table->integer('edad_maxima')->nullable(true);
            $table->string('imagen', 350)->nullable(true);
            $table->unsignedBigInteger('administrador_id')->nullable(true);
            $table->foreign('administrador_id')
                ->references('id')
                ->on('administradores')
                // Para que cuando un administrador sea eliminado, el valor de 'administrador_id' se actualice a 0.
                ->onDelete('set null');
            $table->unsignedBigInteger('centro_civico_id')->nullable(false);
            $table->foreign('centro_civico_id')
                ->references('id')
                ->on('centros_civicos')
                ->onDelete('cascade');
            $table->timestamps();
        });

        // Agregar CK para las columnas que lo necesiten.
        DB::statement("ALTER TABLE actividades ADD CONSTRAINT ACTIV_FECHA_CK CHECK (fecha_inicio <= fecha_fin)");
        DB::statement("ALTER TABLE actividades ADD CONSTRAINT ACTIV_PLAZ_CK
            CHECK (plazas_minimas <= plazas_totales AND plazas_disponibles <= plazas_totales)");
        DB::statement("ALTER TABLE actividades ADD CONSTRAINT ACTIV_EDAD_CK
            CHECK (edad_minima IS NULL OR edad_maxima IS NULL OR edad_minima <= edad_maxima)");
        DB::statement("ALTER TABLE actividades ADD CONSTRAINT ACTIV_DIAS_CK
            CHECK (dia_1 IN ('L', 'M', 'X', 'J', 'V', 'S', 'D')
            AND (dia_2 IS NULL OR dia_2 IN ('L', 'M', 'X', 'J', 'V', 'S', 'D')))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la CK explícitamente.
        DB::statement('ALTER TABLE actividades DROP CONSTRAINT IF EXISTS ACTIV_FECHA_CK');
        DB::statement('ALTER TABLE actividades DROP CONSTRAINT IF EXISTS ACTIV_PLAZ_CK');
        DB::statement('ALTER TABLE actividades DROP CONSTRAINT IF EXISTS ACTIV_EDAD_CK');
        DB::statement('ALTER TABLE actividades DROP CONSTRAINT IF EXISTS ACTIV_DIAS_CK');

        Schema::dropIfExists('actividades');
    }
};
