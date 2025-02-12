<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar a los seeders específicos en el orden correcto (teniendo en cuenta las FK).
        $this->call([
            CiudadanosSeeder::class,
            AdministradoresSeeder::class,
            CentrosCivicosSeeder::class,
            ActividadesSeeder::class,
            InscripcionesSeeder::class,
        ]);
    }
}
