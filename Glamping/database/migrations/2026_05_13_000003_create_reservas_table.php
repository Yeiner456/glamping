<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->foreignId('cliente_id')
                  ->constrained('clientes', 'id_cliente')
                  ->onDelete('cascade');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->enum('tipo_glamping', ['cabaña', 'burbuja', 'domo']);
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
