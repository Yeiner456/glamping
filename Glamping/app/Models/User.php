<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'tipo_usuario',
    ];

    // Relación 1 a 1 con Cliente
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'user_id', 'id_user');
    }
}