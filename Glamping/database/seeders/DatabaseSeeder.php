<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Datos fijos
        $yeiner = User::create([
            'nombre'       => 'Yeiner Smith',
            'correo'       => 'yeiner@gmail.com',
            'telefono'     => '3218341582',
            'tipo_usuario' => 'cliente',
        ]);
        Cliente::create([
            'user_id'             => $yeiner->id_user,
            'documento_identidad' => '1234567890',
            'direccion'           => 'Calle 10 #5-20, Medellín',
        ]);

        $santiago = User::create([
            'nombre'       => 'Santiago Ruiz',
            'correo'       => 'santiago@gmail.com',
            'telefono'     => '3205150484',
            'tipo_usuario' => 'cliente',
        ]);
        Cliente::create([
            'user_id'             => $santiago->id_user,
            'documento_identidad' => '0987654321',
            'direccion'           => 'Carrera 8 #12-45, Bogotá',
        ]);

        DB::table('reservas')->insert([
            'cliente_id'    => 2,
            'fecha_ingreso' => '2025-10-06',
            'fecha_salida'  => '2025-10-09',
            'tipo_glamping' => 'burbuja',
            'estado'        => 'confirmada',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        User::factory(18)->create()->each(function (User $user) {
            $cliente = Cliente::factory()->create([
                'user_id' => $user->id_user,
            ]);
            Reserva::factory(rand(1, 3))->create([
                'cliente_id' => $cliente->id_cliente,
            ]);
        });
    }
}