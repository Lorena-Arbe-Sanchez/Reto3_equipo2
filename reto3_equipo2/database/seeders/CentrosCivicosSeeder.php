<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentrosCivicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('centros_civicos')->insert([
            [
                'nombre' => 'Centro Cívico Abetxuko',
                'telefono' => '945162656',
                'correo' => 'cc.lakua.coo@vitoria-gasteiz.org',
                'direccion' => 'Plaza de la Cooperativa, 8',
                'codigo_postal' => '01013',
                // Hay que poner la ruta "centros_civicos/" ya que es la situada en la carpeta 'public', obtenida con el comando "php artisan storage:link".
                'imagen' => 'centros_civicos/abetxuko.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Centro Cívico Aldabe',
                'telefono' => '945161930',
                'correo' => 'cc.aldabe.coo@vitoria-gasteiz.org',
                'direccion' => 'Portal de Arriaga, 1-A',
                'codigo_postal' => '01012',
                'imagen' => 'centros_civicos/aldabe.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Centro Cívico Arana',
                'telefono' => '945161734',
                'correo' => 'cc.arana.coo@vitoria-gasteiz.org',
                'direccion' => 'Aragón, 7',
                'codigo_postal' => '01003',
                'imagen' => 'centros_civicos/arana.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Centro Cívico Ariznabarra',
                'telefono' => '945162650',
                'correo' => 'cc.ariznabarra.coo@vitoria-gasteiz.org',
                'direccion' => 'Ariznabarra Kalea, 19',
                'codigo_postal' => '01007',
                'imagen' => 'centros_civicos/ariznabarra.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // TODO
            /*
            [
                'nombre' => 'Centro Cívico ',
                'telefono' => '',
                'correo' => 'cc..coo@vitoria-gasteiz.org',
                'direccion' => '',
                'codigo_postal' => '',
                'imagen' => 'centros_civicos/.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Centro Cívico ',
                'telefono' => '',
                'correo' => 'cc..coo@vitoria-gasteiz.org',
                'direccion' => '',
                'codigo_postal' => '',
                'imagen' => 'centros_civicos/.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            */
        ]);

    }
}
