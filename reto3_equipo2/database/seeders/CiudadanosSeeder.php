<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ciudadanos')->insert([
            [
                'nombre' => 'Alice',
                'apellidos' => 'Smith Johnson',
                'dni' => $this->generateValidDNI(),
                'direccion' => 'Calle Mayor, 123',
                'codigo_postal' => '28001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bob',
                'apellidos' => 'Williams Brown',
                'dni' => $this->generateValidDNI(),
                'direccion' => 'Avenida Central, 45',
                'codigo_postal' => '08001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Charlie',
                'apellidos' => 'Jones Davis',
                'dni' => $this->generateValidDNI(),
                'direccion' => 'Plaza del Sol, 67',
                'codigo_postal' => '41001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Diana',
                'apellidos' => 'Miller Wilson',
                'dni' => $this->generateValidDNI(),
                'direccion' => 'Calle Luna, 89',
                'codigo_postal' => '30001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Eve',
                'apellidos' => 'Garcia Perez',
                'dni' => $this->generateValidDNI(),
                'direccion' => 'Paseo de las Delicias, 10',
                'codigo_postal' => '29001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function generateValidDNI(){
        $number = mt_rand(10000000, 99999999);
        $letter = substr('TRWAGMYFPDXBNJZSQVHLCKE', $number % 23, 1);
        return (string) $number . $letter;
    }

    private function generateJuegoBarcos(){
        $result = '';
        for ($i = 0; $i < 16; $i++) {
            $result .= rand(0, 9) . chr(rand(65, 90)); // Genera un número y una letra aleatoria
        }
        return strtoupper($result); // Convierte a mayúsculas
    }
}
