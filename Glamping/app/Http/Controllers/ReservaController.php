<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;

class ReservaController
{
    /** GET /reservas — listar todas */
    public function index()
    {
        $reservas = Reserva::with('cliente')->latest('id_reserva')->get();

        return view('reservas.listar', compact('reservas'));
    }

    /** GET /reservas/create — formulario nueva reserva */
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();

        return view('reservas.registrar', compact('clientes'));
    }

    /** POST /reservas — guardar reserva */
    public function store(StoreReservaRequest $request)
    {
        Reserva::create($request->validated());

        return redirect()->route('reservas.index')
            ->with('exito', 'Reserva creada correctamente.');
    }

    /** GET /reservas/{id}/edit — formulario editar */
    public function edit(Reserva $reserva)
    {
        return view('reservas.editar', compact('reserva'));
    }

    /** PUT /reservas/{id} — actualizar estado */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        $reserva->update($request->validated());

        return redirect()->route('reservas.index')
            ->with('exito', 'Reserva actualizada correctamente.');
    }

    /** DELETE /reservas/{id} — eliminar */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')
            ->with('exito', 'Reserva eliminada correctamente.');
    }
}
