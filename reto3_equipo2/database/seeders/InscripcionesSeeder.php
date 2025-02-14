<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscripcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inscripciones')->insert([
            // TODO : Crear como 30 ciudadanos y hacer sus inscripciones (la cantidad por una actividad tiene que coincidir con (plazas_totales - plazas_disponibles) de la actividad)
            [
                'id_actividad' => 2,
                'id_ciudadano' => 2,
                'created_at' => '2024-01-15 10:00:00',
                'updated_at' => '2024-01-15 10:00:00',
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 4,
                'created_at' => '2024-02-20 14:30:00',
                'updated_at' => '2024-02-20 14:30:00',
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 1,
                'created_at' => '2024-03-10 09:15:00',
                'updated_at' => '2024-03-10 09:15:00',
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 5,
                'created_at' => '2024-04-05 16:45:00',
                'updated_at' => '2024-04-05 16:45:00',
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 3,
                'created_at' => '2024-05-01 11:00:00',
                'updated_at' => '2024-05-01 11:00:00',
            ],
        ]);
    }
}
