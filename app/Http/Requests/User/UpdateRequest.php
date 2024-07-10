<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'surName' => 'sometimes|required|string|max:255',
            'addres' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'gender' => 'sometimes|required|string|in:male,female,other', // Ajusta según los valores permitidos
            'rol_id' => 'sometimes|required|integer|exists:rols,id', // Asumiendo que tienes una tabla roles
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta los formatos y tamaño máximo de archivo según tus necesidades
        ];
    }
}
