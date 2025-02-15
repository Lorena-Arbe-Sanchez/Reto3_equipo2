<?php

namespace Database\Seeders;

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
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Aldabe',
                'telefono' => '945161930',
                'correo' => 'cc.aldabe.coo@vitoria-gasteiz.org',
                'direccion' => 'Calle Portal de Arriaga, 1-A',
                'codigo_postal' => '01012',
                'imagen' => 'centros_civicos/aldabe.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Arana',
                'telefono' => '945161734',
                'correo' => 'cc.arana.coo@vitoria-gasteiz.org',
                'direccion' => 'Calle Aragón, 7',
                'codigo_postal' => '01003',
                'imagen' => 'centros_civicos/arana.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Ariznabarra',
                'telefono' => '945162650',
                'correo' => 'cc.ariznabarra.coo@vitoria-gasteiz.org',
                'direccion' => 'Ariznabarra Kalea, 19',
                'codigo_postal' => '01007',
                'imagen' => 'centros_civicos/ariznabarra.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Arriaga',
                'telefono' => '945161770',
                'correo' => 'cc.arriaga.coo@vitoria-gasteiz.org',
                'direccion' => 'Calle Francisco Javier De Landáburu, 9-A',
                'codigo_postal' => '01010',
                'imagen' => 'centros_civicos/arriaga.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico El Campillo',
                'telefono' => '945161680',
                'correo' => 'cc.el_campillo.coo@vitoria-gasteiz.org',
                'direccion' => 'Calle Santa María, 4',
                'codigo_postal' => '01001',
                'imagen' => 'centros_civicos/el_campillo.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico El Pilar',
                'telefono' => '945161233',
                'correo' => 'cc.el_pilar.coo@vitoria-gasteiz.org',
                'direccion' => 'Plaza de la Constitución, 5',
                'codigo_postal' => '01012',
                'imagen' => 'centros_civicos/el_pilar.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Hegoalde',
                'telefono' => '945161880',
                'correo' => 'cc.hegoalde.coo@vitoria-gasteiz.org',
                'direccion' => 'Calle de Alberto Schommer, 10',
                'codigo_postal' => '01006',
                'imagen' => 'centros_civicos/hegoalde.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Ibaiondo',
                'telefono' => '945161813',
                'correo' => 'cc.ibaiondo.coo@vitoria-gasteiz.org',
                'direccion' => 'Landaberde Kalea, 31',
                'codigo_postal' => '01010',
                'imagen' => 'centros_civicos/ibaiondo.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Iparralde',
                'telefono' => '945161750',
                'correo' => 'cc.iparralde.coo@vitoria-gasteiz.org',
                'direccion' => 'Plaza Zuberoa, 1',
                'codigo_postal' => '01002',
                'imagen' => 'centros_civicos/iparralde.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Judimendi',
                'telefono' => '945161740',
                'correo' => 'cc.judimendi.coo@vitoria-gasteiz.org',
                'direccion' => 'Avenida Judimendi, 26',
                'codigo_postal' => '01002',
                'imagen' => 'centros_civicos/judimendi.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Lakua',
                'telefono' => '945162630',
                'correo' => 'cc.lakua.coo@vitoria-gasteiz.org',
                'direccion' => 'Senda Valentín Foronda, 9',
                'codigo_postal' => '01010',
                'imagen' => 'centros_civicos/lakua.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Salburua',
                'telefono' => '945161637',
                'correo' => 'cc.salburua.coo@vitoria-gasteiz.org',
                'direccion' => 'Avenida Bratislava, 2',
                'codigo_postal' => '01003',
                'imagen' => 'centros_civicos/salburua.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
            [
                'nombre' => 'Centro Cívico Zabalgana',
                'telefono' => '945161630',
                'correo' => 'cc.zabalgana.coo@vitoria-gasteiz.org',
                'direccion' => 'Juan Gris Kalea, 12',
                'codigo_postal' => '01015',
                'imagen' => 'centros_civicos/zabalgana.png',
                'created_at' => '2010-01-10 10:00:00',
                'updated_at' => '2010-01-10 10:00:00',
            ],
        ]);

    }
}
