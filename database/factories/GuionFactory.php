<?php

namespace Database\Factories;

use App\Models\guion;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuionFactory extends Factory
{
    protected $model = guion::class;

    public function definition()
    {
        return [
            'canal' => $this->faker->randomElement(['email', 'teléfono', 'chat', 'presencial']),
            'mensaje' => $this->faker->paragraph(3),
            'fecha_creacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
