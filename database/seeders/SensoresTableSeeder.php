<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensores')->insert([
            [
                'tipo_sensor' => 'ventilador',
                'nombre_sensor' => 'Ventilador',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'impacto',
                'nombre_sensor' => 'Impacto',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'led',
                'nombre_sensor' => 'Cerradura',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'ultrasonico',
                'nombre_sensor' => 'Ultrasonico',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'gas',
                'nombre_sensor' => 'Gas',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'luz',
                'nombre_sensor' => 'Luz',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'humedad',
                'nombre_sensor' => 'Humedad',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'vibracion',
                'nombre_sensor' => 'Vibracion',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_sensor' => 'temperatura',
                'nombre_sensor' => 'Temperatura',
                'fecha_registro' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
