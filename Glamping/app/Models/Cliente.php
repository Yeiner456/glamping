<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'user_id',
        'documento_identidad',
        'direccion',
    ];

    // Relación 1 a 1 con User (padre)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    // Relación 1 a muchos con Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'cliente_id', 'id_cliente');
    }
}