<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\vendedor;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendedor=new vendedor();
        $vendedor->nombre='david vazquez casanova';
        $vendedor->identificacion='2385946537';
        $vendedor->telefono='3903457823';
        $vendedor->direccion='calle 45r #23-56';
        $vendedor->correo='vazquez@gmail.com';

        $vendedor->save();

        $vendedor2 = new vendedor();
        $vendedor2->nombre = 'María Fernanda López';
        $vendedor2->identificacion = '1987654321';
        $vendedor2->telefono = '3109876543';
        $vendedor2->direccion = 'Carrera 12 #34-89';
        $vendedor2->correo = 'maria.lopez@gmail.com';
        $vendedor2->save();

        $vendedor3 = new vendedor();
        $vendedor3->nombre = 'Carlos Alberto Ruiz';
        $vendedor3->identificacion = '3456789123';
        $vendedor3->telefono = '3012345678';
        $vendedor3->direccion = 'Avenida 9 #67-45';
        $vendedor3->correo = 'carlos.ruiz@gmail.com';
        $vendedor3->save();

        $vendedor4 = new vendedor();
        $vendedor4->nombre = 'Sofía Jiménez';
        $vendedor4->identificacion = '4567891234';
        $vendedor4->telefono = '3208765432';
        $vendedor4->direccion = 'Calle 50 #10-20';
        $vendedor4->correo = 'sofia.jimenez@gmail.com';
        $vendedor4->save();

        $vendedor5 = new vendedor();
        $vendedor5->nombre = 'Ricardo Mendoza';
        $vendedor5->identificacion = '5678912345';
        $vendedor5->telefono = '3156789012';
        $vendedor5->direccion = 'Diagonal 25 #30-15';
        $vendedor5->correo = 'ricardo.mendoza@gmail.com';
        $vendedor5->save();
    }
}
