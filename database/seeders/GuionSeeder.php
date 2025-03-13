<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GuionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guion_ventas')->insert([
            [
                'canal' => 'Email',
                'mensaje' => 'Estimado cliente, queremos presentarle nuestra nueva oferta exclusiva para este mes. ¡No se la pierda!',
                'fecha_creacion' => Carbon::now()->subDays(15)->toDateString(),
            ],
            [
                'canal' => 'Teléfono',
                'mensaje' => 'Hola, le llamamos para ofrecerle un descuento especial en nuestros productos. ¿Le gustaría conocer más detalles?',
                'fecha_creacion' => Carbon::now()->subDays(10)->toDateString(),
            ],
            [
                'canal' => 'WhatsApp',
                'mensaje' => '📢 ¡Grandes ofertas esta semana! Responda a este mensaje para obtener más información.',
                'fecha_creacion' => Carbon::now()->subDays(5)->toDateString(),
            ],
            [
                'canal' => 'Redes Sociales',
                'mensaje' => '🎉 Descubre nuestras promociones exclusivas en nuestra tienda en línea. ¡Visítanos ahora!',
                'fecha_creacion' => Carbon::now()->toDateString(),
            ],
        ]);
    }
}

