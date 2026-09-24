<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_empresa' => 'required|string|max:255',
            'contacto_principal' => 'required|string|max:255',
            'telefono_whatsapp' => 'required|numeric|digits_between:10,15',
            'zona_geografica' => 'required|in:Oeste,Este,Cabudare,Centro,Zona Industrial',
            'origin_id' => 'required|exists:origins,id',
        ];
    }
}
