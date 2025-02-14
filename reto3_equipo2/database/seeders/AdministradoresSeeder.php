<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->insert([
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Fernández López',
                'dni' => '12345678Z',
                'direccion' => 'Calle Mayor, 10',
                'codigo_postal' => '28001',
                'usuario' => 'carlosf',
                'password' => bcrypt('contra123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María',
                'apellidos' => 'García Pérez',
                'dni' => '87654321X',
                'direccion' => 'Avenida de la Paz, 5',
                'codigo_postal' => '28002',
                'usuario' => 'mariag',
                'password' => bcrypt('contra123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
