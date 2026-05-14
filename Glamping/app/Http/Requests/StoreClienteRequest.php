<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'   => ['required', 'string', 'max:100', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
            'correo'   => ['required', 'email', 'max:100', 'unique:clientes,correo'],
            'telefono' => ['required', 'digits_between:7,15'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'         => 'El nombre es obligatorio.',
            'nombre.regex'            => 'El nombre solo puede contener letras y espacios.',
            'nombre.max'              => 'El nombre no puede superar 100 caracteres.',
            'correo.required'         => 'El correo es obligatorio.',
            'correo.email'            => 'El correo no tiene un formato válido.',
            'correo.unique'           => 'Este correo ya está registrado.',
            'telefono.required'       => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',
        ];
    }
}