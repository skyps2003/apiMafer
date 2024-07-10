<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surName' => 'required|string|max:255',
            'addres' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|numeric|in:0,1,2', // Ajusta según los valores permitidos
            'rol_id' => 'required|integer|exists:rols,id', // Asumiendo que tienes una tabla roles
            'img' => 'nullable', // Ajusta los formatos y tamaño máximo de archivo según tus necesidades
        ];
    }
}
