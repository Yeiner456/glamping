<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre'       => fake()->name(),
            'correo'       => fake()->unique()->safeEmail(),
            'telefono'     => fake()->numerify('###-###-####'),
            'tipo_usuario' => 'cliente',
        ];
    }
}