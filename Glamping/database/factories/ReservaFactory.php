<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    public function definition(): array
    {
        $fechaIngreso = fake()->dateTimeBetween('now', '+3 months');
        $fechaSalida  = fake()->dateTimeBetween($fechaIngreso, (clone $fechaIngreso)->modify('+7 days'));

        return [
            'cliente_id'    => Cliente::factory(),
            'fecha_ingreso' => $fechaIngreso->format('Y-m-d'),
            'fecha_salida'  => $fechaSalida->format('Y-m-d'),
            'tipo_glamping' => fake()->randomElement(['cabaña', 'burbuja', 'domo']),
            'estado'        => fake()->randomElement(['pendiente', 'confirmada', 'cancelada']),
        ];
    }

    // Estado específico (opcional, útil en tests)
    public function pendiente(): static
    {
        return $this->state(fn () => ['estado' => 'pendiente']);
    }

    public function confirmada(): static
    {
        return $this->state(fn () => ['estado' => 'confirmada']);
    }

    public function cancelada(): static
    {
        return $this->state(fn () => ['estado' => 'cancelada']);
    }
}