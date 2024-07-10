<?php

namespace App\Http\Requests\ProductType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $productTypeId = $this->route('product_type'); // Obtener el ID del producto desde la ruta

        return [
            'name' => [
                'required',
                Rule::unique('product_types')->ignore($productTypeId),
                'max:255'
            ],
            'description' => 'nullable|string',
        ];
    }
}
