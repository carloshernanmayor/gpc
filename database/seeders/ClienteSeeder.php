<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\posible_cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente=new cliente();
        $cliente->nombre='Miguel angel orejuela';
        $cliente->identificacion='2345321349';
        $cliente->telefono='3276789098';
        $cliente->direccion='calle 50a #20-80';
        $cliente->correo='miguel34@gmail.com';

        $cliente->save();

        $cliente2 = new cliente();
        $cliente2->nombre = 'Juan Pérez';
        $cliente2->identificacion = '8765432190';
        $cliente2->telefono = '3001234567';
        $cliente2->direccion = 'Carrera 10 #15-30';
        $cliente2->correo = 'juanperez@gmail.com';
        $cliente2->save();

        $cliente3 = new cliente();
        $cliente3->nombre = 'Carlos Ramírez';
        $cliente3->identificacion = '9876543210';
        $cliente3->telefono = '3124567890';
        $cliente3->direccion = 'Calle 100 #45-67';
        $cliente3->correo = 'carlosramirez@gmail.com';
        $cliente3->save(); 
 
    }
}
