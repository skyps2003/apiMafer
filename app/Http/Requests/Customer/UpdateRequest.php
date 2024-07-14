<?php

namespace App\Http\Requests\Customer;

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
        $customerId = $this->route('customer'); 
    return [
        'name' => ['required', 'string', 'max:255'], 
        'surname' => ['required', 'string', 'max:255'], 
        'dni' => ['required', 'string', 'min:8', 'max:12'], 
        'ruc' => ['nullable', 'string', 'size:11'], 
        'customer_type_id' => ['required', 'integer', 'exists:customer_types,id'], 
        'reason' => ['nullable', 'string', 'max:255'], 
        'address' => ['nullable', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', "unique:customers,email,{$customerId}"], 
        'phone' => ['nullable', 'string', 'regex:/^[0-9]{7,15}$/']
    ];
    }
}
