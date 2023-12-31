<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 registros de prueba
        foreach (range(1, 10) as $index) {
            $nombre = Str::random(10);
            $opcionesTipo = ['Acero', 'Agua', 'Dragón', 'Eléctrico', 'Fantasma', 'Hada', 'Normal', 'Planta', 'Psíquico', 'Siniestro', 'Tierra', 'Volador'];
            $tipo = $opcionesTipo[array_rand($opcionesTipo)]; // Selecciona aleatoriamente un tipo del array
            $opcionesTamaño = ['Grande','Mediano','Pequeño'];
            $tamaño = $opcionesTamaño[array_rand($opcionesTamaño)];
            $peso = $this->randomFloat(2, 1, 100);

            DB::table('pokemon')->insert([
                'Nombre' => $nombre,
                'Tipo' => $tipo,
                'Tamaño' => $tamaño,
                'Peso' => $peso
            ]);
        }
    }

    private function randomFloat($decimals, $min, $max) {
        return round($min + mt_rand() / mt_getrandmax() * ($max - $min), $decimals);
    }
}

//comando para enviar semilla -> php artisan db:seed