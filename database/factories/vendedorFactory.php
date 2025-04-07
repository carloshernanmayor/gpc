<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class vendedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'nombre'=> fake()->name(),
            'identificacion'=>fake()->unique()->numerify('##########'),
            'telefono'=>fake()->phoneNumber,
            'direccion'=>fake()->unique->address,
            'correo'=>fake()->unique->safeEmail(),
            'fecha_ingreso'=> now(),
            'estado'=> 'activo',      
        ];
    }
}
