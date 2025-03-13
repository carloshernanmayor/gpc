<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto')->insert([
            [
                'nombre' => 'Mesa de Oficina',
                'tipo' => 'Mueble',
                'material' => 'Madera',
                'sector' => 'Oficina',
                'dimensiones' => '120x60x75 cm',
                'fecha_creacion' => Carbon::now(),
            ],
            [
                'nombre' => 'Silla Ergonómica',
                'tipo' => 'Mueble',
                'material' => 'Plástico y metal',
                'sector' => 'Oficina',
                'dimensiones' => '55x55x100 cm',
                'fecha_creacion' => Carbon::now()->subDays(5),
            ],
            [
                'nombre' => 'Lámpara LED',
                'tipo' => 'Iluminación',
                'material' => 'Metal y vidrio',
                'sector' => 'Hogar',
                'dimensiones' => '20x20x50 cm',
                'fecha_creacion' => Carbon::now()->subDays(10),
            ],
        ]);
    }
}
    
