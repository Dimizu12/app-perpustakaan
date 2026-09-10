<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
    //  * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ];
    }

    public function massage(): array {
        return [
            'category_name.required' => 'Category name is required',
            'category_name.max' => 'Category name may not be greater than 100 characters',
        ];
    }
}
