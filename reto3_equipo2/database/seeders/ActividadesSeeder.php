<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actividades')->insert([
            [
                'titulo' => 'Yoga Matutino',
                'descripcion' => 'Clase de yoga para comenzar el día con energía y relajación.',
                'fecha_inicio' => '2025-03-01',
                'fecha_fin' => '2025-06-01',
                'dia_1' => 'L',
                'dia_2' => null,
                'hora_inicio' => '08:00',
                'hora_fin' => '09:30',
                'idioma' => 'Español',
                'plazas_totales' => 20,
                'plazas_disponibles' => 11,
                'plazas_minimas' => 5,
                'edad_minima' => 16,
                'edad_maxima' => null,
                'imagen' => 'actividades/yoga.jpg',
                'administrador_id' => 1,
                'centro_civico_id' => 1,
                'created_at' => '2024-01-10 10:00:00',
                'updated_at' => '2024-01-10 10:00:00',
            ],
            [
                'titulo' => 'Taller de Pintura',
                'descripcion' => 'Aprende técnicas básicas de pintura acrílica y óleo.',
                'fecha_inicio' => '2025-04-05',
                'fecha_fin' => '2025-07-05',
                'dia_1' => 'M',
                'dia_2' => 'J',
                'hora_inicio' => '17:00',
                'hora_fin' => '19:00',
                'idioma' => 'Español',
                'plazas_totales' => 15,
                'plazas_disponibles' => 5,
                'plazas_minimas' => 5,
                'edad_minima' => 12,
                'edad_maxima' => 30,
                'imagen' => 'actividades/pintura.jpg',
                'administrador_id' => 2,
                'centro_civico_id' => 2,
                'created_at' => '2024-01-10 10:00:00',
                'updated_at' => '2024-01-10 10:00:00',
            ],
            [
                'titulo' => 'Club de Lectura',
                'descripcion' => 'Discusión y análisis de libros de diferentes géneros.',
                'fecha_inicio' => '2025-05-10',
                'fecha_fin' => '2025-09-10',
                'dia_1' => 'V',
                'dia_2' => null,
                'hora_inicio' => '18:30',
                'hora_fin' => '20:00',
                'idioma' => 'Euskera',
                'plazas_totales' => 10,
                'plazas_disponibles' => 6,
                'plazas_minimas' => 3,
                'edad_minima' => 18,
                'edad_maxima' => null,
                'imagen' => 'actividades/lectura.jpg',
                'administrador_id' => 1,
                'centro_civico_id' => 3,
                'created_at' => '2024-01-10 10:00:00',
                'updated_at' => '2024-01-10 10:00:00',
            ],
            [
                'titulo' => 'Danza Moderna',
                'descripcion' => 'Clases de danza contemporánea y expresión corporal.',
                'fecha_inicio' => '2025-03-15',
                'fecha_fin' => '2025-07-15',
                'dia_1' => 'L',
                'dia_2' => 'J',
                'hora_inicio' => '19:00',
                'hora_fin' => '20:30',
                'idioma' => 'Español',
                'plazas_totales' => 20,
                'plazas_disponibles' => 1,
                'plazas_minimas' => 8,
                'edad_minima' => 14,
                'edad_maxima' => 35,
                'imagen' => 'actividades/danza.jpg',
                'administrador_id' => 2,
                'centro_civico_id' => 1,
                'created_at' => '2024-01-10 10:00:00',
                'updated_at' => '2024-01-10 10:00:00',
            ],
        ]);
    }
}
