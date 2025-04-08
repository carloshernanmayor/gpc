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
            'nombre'=>$this->faker->name(),
            'identificacion'=>$this->faker->unique()->numerify('##########'),
            'telefono'=>$this->faker->phoneNumber,
            'direccion'=>$this->faker->unique->address,
            'correo'=>$this->faker->unique->safeEmail(),
            'fecha_ingreso'=> now(),
            'estado'=> 'activo',      
        ];
    }
}
