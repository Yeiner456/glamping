<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_reserva';

    protected $fillable = [
        'cliente_id',
        'fecha_ingreso',
        'fecha_salida',
        'tipo_glamping',
        'estado',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'fecha_salida'  => 'date',
    ];

    /** Una reserva pertenece a un cliente */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }
}
