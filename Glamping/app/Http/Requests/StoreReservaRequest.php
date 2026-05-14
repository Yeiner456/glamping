<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id'    => ['required', 'exists:clientes,id_cliente'],
            'fecha_ingreso' => ['required', 'date', 'after_or_equal:today'],
            'fecha_salida'  => ['required', 'date', 'after:fecha_ingreso'],
            'tipo_glamping' => ['required', 'in:cabaña,burbuja,domo'],
            'estado'        => ['required', 'in:pendiente,confirmada,cancelada'],
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_id.required'          => 'Debes seleccionar un cliente.',
            'cliente_id.exists'            => 'El cliente seleccionado no existe.',
            'fecha_ingreso.required'       => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.after_or_equal' => 'La fecha de ingreso no puede ser anterior a hoy.',
            'fecha_salida.required'        => 'La fecha de salida es obligatoria.',
            'fecha_salida.after'           => 'La fecha de salida debe ser posterior a la de ingreso.',
            'tipo_glamping.required'       => 'Debes seleccionar un tipo de glamping.',
            'tipo_glamping.in'             => 'El tipo de glamping no es válido.',
            'estado.required'              => 'El estado es obligatorio.',
            'estado.in'                    => 'El estado no es válido.',
        ];
    }
}