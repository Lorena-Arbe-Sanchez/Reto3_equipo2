<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
                'nombre' => 'Alicia',
                'apellidos' => 'Sánchez Jiménez',
                'dni' => '12345678Z',
                'fecha_nacimiento' => Carbon::create('1990-01-01'),
                'direccion' => 'Calle Mayor, 123',
                'codigo_postal' => '28001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bob',
                'apellidos' => 'Williams Pérez',
                'dni' => '98765432M',
                'fecha_nacimiento' => Carbon::create('2002-01-01'),
                'direccion' => 'Avenida Central, 45',
                'codigo_postal' => '08001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'César',
                'apellidos' => 'Jiménez Gil',
                'dni' => '45612378L',
                'fecha_nacimiento' => Carbon::create('1960-01-01'),
                'direccion' => 'Plaza del Sol, 67',
                'codigo_postal' => '41001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Diana',
                'apellidos' => 'Miller Martín',
                'dni' => '32178965H',
                'fecha_nacimiento' => Carbon::create('1950-01-01'),
                'direccion' => 'Calle Luna, 89',
                'codigo_postal' => '30001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Eugenia',
                'apellidos' => 'García Pérez',
                'dni' => '74125896J',
                'fecha_nacimiento' => Carbon::create('2010-01-01'),
                'direccion' => 'Paseo de las Delicias, 10',
                'codigo_postal' => '29001',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Fernando',
                'apellidos' => 'López García',
                'dni' => '85296374D',
                'fecha_nacimiento' => Carbon::create('1985-05-15'),
                'direccion' => 'Calle del Río, 24',
                'codigo_postal' => '28002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Gloria',
                'apellidos' => 'Martínez Ruiz',
                'dni' => '15935728Q',
                'fecha_nacimiento' => Carbon::create('1972-11-03'),
                'direccion' => 'Travesía de la Paz, 1',
                'codigo_postal' => '08002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Hugo',
                'apellidos' => 'Fernández Gómez',
                'dni' => '26354789T',
                'fecha_nacimiento' => Carbon::create('2005-08-22'),
                'direccion' => 'Ronda de la Libertad, 78',
                'codigo_postal' => '41002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Irene',
                'apellidos' => 'Sanz Torres',
                'dni' => '39586741X',
                'fecha_nacimiento' => Carbon::create('1998-03-10'),
                'direccion' => 'Camino del Sol, 3',
                'codigo_postal' => '30002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Javier',
                'apellidos' => 'Díaz Álvarez',
                'dni' => '67891234B',
                'fecha_nacimiento' => Carbon::create('2015-09-28'),
                'direccion' => 'Plaza Mayor, 5',
                'codigo_postal' => '29002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Koldo',
                'apellidos' => 'Ruiz Dominguez',
                'dni' => '74136985V',
                'fecha_nacimiento' => Carbon::create('2015-04-22'),
                'direccion' => 'Pasaje Maritimo, 134',
                'codigo_postal' => '35002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Gutierrez Gonzalez',
                'dni' => '85274196N',
                'fecha_nacimiento' => Carbon::create('1988-07-12'),
                'direccion' => 'Callejon Esperanza, 15',
                'codigo_postal' => '36002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Marina',
                'apellidos' => 'Marin Flores',
                'dni' => '96385274R',
                'fecha_nacimiento' => Carbon::create('1975-02-05'),
                'direccion' => 'Avenida del Puerto, 22',
                'codigo_postal' => '37002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Nicolas',
                'apellidos' => 'Blazquez Maeso',
                'dni' => '75315926K',
                'fecha_nacimiento' => Carbon::create('2000-06-18'),
                'direccion' => 'Carretera Antigua, 45',
                'codigo_postal' => '38002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Olivia',
                'apellidos' => 'Salazar Merino',
                'dni' => '15948732G',
                'fecha_nacimiento' => Carbon::create('2012-10-30'),
                'direccion' => 'Glorieta de las Estrellas, 12',
                'codigo_postal' => '39002',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Martínez López',
                'dni' => '26483957C',
                'fecha_nacimiento' => Carbon::create('1978-06-20'),
                'direccion' => 'Calle del Campo, 56',
                'codigo_postal' => '28003',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Raquel',
                'apellidos' => 'Gómez Sánchez',
                'dni' => '34821697P',
                'fecha_nacimiento' => Carbon::create('2001-04-12'),
                'direccion' => 'Avenida de la Estación, 12',
                'codigo_postal' => '08003',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Santiago',
                'apellidos' => 'Ruiz Pérez',
                'dni' => '76823145F',
                'fecha_nacimiento' => Carbon::create('1965-12-01'),
                'direccion' => 'Plaza de España, 8',
                'codigo_postal' => '41003',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Teresa',
                'apellidos' => 'Fernández García',
                'dni' => '87951462Y',
                'fecha_nacimiento' => Carbon::create('1992-09-05'),
                'direccion' => 'Paseo Marítimo, 34',
                'codigo_postal' => '30003',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Víctor',
                'apellidos' => 'Álvarez Jiménez',
                'dni' => '91562483W',
                'fecha_nacimiento' => Carbon::create('2018-02-18'),
                'direccion' => 'Calle del Olivo, 101',
                'codigo_postal' => '29003',
                'juego_barcos' => $this->generateJuegoBarcos(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    // Hay que poner los DNI-s a mano para que siempre sean los mismos y sea más fácil hacer consultas cada vez que se ejecutan los Seeders.
    /*
    private function generateValidDNI(){
        $number = mt_rand(10000000, 99999999);
        $letter = substr('TRWAGMYFPDXBNJZSQVHLCKE', $number % 23, 1);
        return (string) $number . $letter;
    }
    */

    private function generateJuegoBarcos(){
        $result = '';
        for ($i = 0; $i < 16; $i++) {
            $result .= rand(0, 9) . chr(rand(65, 90)); // Genera un número y una letra aleatoria
        }
        return strtoupper($result); // Convierte a mayúsculas
    }
}
