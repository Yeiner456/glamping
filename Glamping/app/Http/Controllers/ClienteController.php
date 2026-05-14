<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;

class ClienteController
{
    /** GET /clientes/create — mostrar formulario */
    public function create()
    {
        return view('clientes.registrar');
    }

    /** POST /clientes — guardar cliente */
    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->validated());

        return redirect()->route('home')
                         ->with('exito', 'Cliente registrado correctamente.');
    }
}
