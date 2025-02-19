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

            // Hay que tener en cuenta la edad de los ciudadanos, el rango de edad de las actividades y las plazas que deben estar ocupadas (teniendo en cuenta los Seeders de las actividades)

            // Actividad 1: Yoga Matutino (Edad: 16+) - Plazas Totales: 20, Plazas Disponibles: 17
            [
                'id_actividad' => 1,
                'id_ciudadano' => 6, // Fernando (1985) - 39 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 1,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 1,
                'id_ciudadano' => 12, // Luis (1988) - 36 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 2: Taller de Pintura (Edad: 12-30) - Plazas Totales: 15, Plazas Disponibles: 11
            [
                'id_actividad' => 2,
                'id_ciudadano' => 2, // Bob (2002) - 22 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 8, // Hugo (2005) - 19 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 14, // Nicolas (2000) - 24 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 2,
                'id_ciudadano' => 17, // Raquel (2001) - 23 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 3: Club de Lectura (Edad: 18+) - Plazas Totales: 10, Plazas Disponibles: 7
            [
                'id_actividad' => 3,
                'id_ciudadano' => 1, // Alicia (1990) - 34 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 3,
                'id_ciudadano' => 7, // Gloria (1972) - 52 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 3,
                'id_ciudadano' => 13, // Marina (1975) - 49 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 4: Danza Moderna (Edad: 14-35) - Plazas Totales: 20, Plazas Disponibles: 15
            [
                'id_actividad' => 4,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 4,
                'id_ciudadano' => 2, // Bob (2002) - 22 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 4,
                'id_ciudadano' => 8, // Hugo (2005) - 19 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 4,
                'id_ciudadano' => 14, // Nicolas (2000) - 24 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 4,
                'id_ciudadano' => 17, // Raquel (2001) - 23 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 5: Cocina Internacional (Edad: 18+) - Plazas Totales: 12, Plazas Disponibles: 6
            [
                'id_actividad' => 5,
                'id_ciudadano' => 1, // Alicia (1990) - 34 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 5,
                'id_ciudadano' => 7, // Gloria (1972) - 52 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 5,
                'id_ciudadano' => 13, // Marina (1975) - 49 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 5,
                'id_ciudadano' => 6, // Fernando (1985) - 39 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 5,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 5,
                'id_ciudadano' => 12, // Luis (1988) - 36 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 6: Inglés Conversacional (Edad: 8-15) - Plazas Totales: 15, Plazas Disponibles: 11
            [
                'id_actividad' => 6,
                'id_ciudadano' => 5, // Eugenia (2010) - 14 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 6,
                'id_ciudadano' => 10, // Javier (2015) - 9 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 6,
                'id_ciudadano' => 11, // Koldo (2015) - 9 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 6,
                'id_ciudadano' => 15, // Olivia (2012) - 12 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 7: Teatro para Principiantes (Edad: 14-40) - Plazas Totales: 18, Plazas Disponibles: 13
            [
                'id_actividad' => 7,
                'id_ciudadano' => 1, // Alicia (1990) - 34 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 7,
                'id_ciudadano' => 2, // Bob (2002) - 22 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 7,
                'id_ciudadano' => 6, // Fernando (1985) - 39 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 7,
                'id_ciudadano' => 8, // Hugo (2005) - 19 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 7,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 8: Fotografía Digital (Edad: 16+) - Plazas Totales: 14, Plazas Disponibles: 8
            [
                'id_actividad' => 8,
                'id_ciudadano' => 1, // Alicia (1990) - 34 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 8,
                'id_ciudadano' => 6, // Fernando (1985) - 39 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 8,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 8,
                'id_ciudadano' => 12, // Luis (1988) - 36 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 8,
                'id_ciudadano' => 17, // Raquel (2001) - 23 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 8,
                'id_ciudadano' => 14, // Nicolas (2000) - 24 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 9: Jardinería Urbana (Edad: 16+) - Plazas Totales: 18, Plazas Disponibles: 12
            [
                'id_actividad' => 9,
                'id_ciudadano' => 1, // Alicia (1990) - 34 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 9,
                'id_ciudadano' => 6, // Fernando (1985) - 39 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 9,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 9,
                'id_ciudadano' => 12, // Luis (1988) - 36 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 9,
                'id_ciudadano' => 13, // Marina (1975) - 49 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 9,
                'id_ciudadano' => 17, // Raquel (2001) - 23 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 10: Escritura Creativa (Edad: 12-25) - Plazas Totales: 12, Plazas Disponibles: 6
            [
                'id_actividad' => 10,
                'id_ciudadano' => 2, // Bob (2002) - 22 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 10,
                'id_ciudadano' => 5, // Eugenia (2010) - 14 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 10,
                'id_ciudadano' => 8, // Hugo (2005) - 19 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 10,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 10,
                'id_ciudadano' => 14, // Nicolas (2000) - 24 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 10,
                'id_ciudadano' => 17, // Raquel (2001) - 23 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 11: Mindfulness y Meditación (Edad: 18+) - Plazas Totales: 15, Plazas Disponibles: 2
            [
                'id_actividad' => 11,
                'id_ciudadano' => 1, // Alicia (1990) - 34 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 3, // César (1960) - 64 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 4, // Diana (1950) - 74 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 6, // Fernando (1985) - 39 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 7, // Gloria (1972) - 52 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 9, // Irene (1998) - 26 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 12, // Luis (1988) - 36 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 13, // Marina (1975) - 49 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 14, // Nicolas (2000) - 24 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 16, // Pedro (1978) - 46 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 17, // Raquel (2001) - 23 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 18, // Santiago (1965) - 59 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 11,
                'id_ciudadano' => 19, // Teresa (1992) - 32 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Actividad 12: Informática para Mayores (Edad: 50+) - Plazas Totales: 10, Plazas Disponibles: 6
            [
                'id_actividad' => 12,
                'id_ciudadano' => 3, // César (1960) - 64 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 12,
                'id_ciudadano' => 4, // Diana (1950) - 74 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 12,
                'id_ciudadano' => 7, // Gloria (1972) - 52 años
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_actividad' => 12,
                'id_ciudadano' => 18, // Santiago (1965) - 59 años
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
