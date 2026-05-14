<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'             => User::factory(),
            'documento_identidad' => fake()->unique()->numerify('##########'),
            'direccion'           => fake()->address(),
        ];
    }
}