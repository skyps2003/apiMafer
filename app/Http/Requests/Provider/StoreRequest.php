<?php

namespace App\Http\Requests\Provider;

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
            'ruc' => ['required', 'unique:providers,ruc', 'max:20'], 
            'name' => ['required', 'max:250'],
            'phone' => ['required', 'unique:providers,phone', 'max:20'], 
            'email' => ['required', 'email', 'unique:providers,email', 'max:250'], 
            'address' => ['required', 'max:250'],
            'reason' => ['required', 'max:250']
        ];
    }
}
