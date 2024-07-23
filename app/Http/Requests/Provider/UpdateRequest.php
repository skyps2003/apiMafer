<?php

namespace App\Http\Requests\Provider;

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
            'ruc' => ['sometimes', 'required', 'unique:providers,ruc,' . $this->route('provider')->id, 'digits:11'],
            'name' => ['sometimes', 'required', 'max:250'],
            'phone' => ['sometimes', 'required', 'unique:providers,phone,' . $this->route('provider')->id, 'digits:9'],
            'email' => ['sometimes', 'required', 'email', 'unique:providers,email,' . $this->route('provider')->id, 'max:250'],
            'address' => ['sometimes', 'required', 'max:250'],
            'reason' => ['required', 'max:250']
        ];
    }
}


