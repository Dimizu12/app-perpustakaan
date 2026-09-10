<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => 'required|string|max:200',
            'writer' => 'required|string|max:100',
            'publisher' => 'required|string|max:100',
            'publication_year' => 'required|integer|min:1900|max:'.date('Y'),
            'isbn' => 'nullable|string|max:20',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer'
        ];
    }

    public function massage(): array {
        return [
            'title.required' => 'The book title is required.',
            'title.max' => 'The book title may not be greater than 200 characters.',
            'writer.required' => 'The writer name is required.',
            'publisher.required' => 'The publisher name is required.',
            'publication_year.required' => 'The publication year is required.',
            'publication_year.integer' => 'The publication year must be a number.',
            'publication_year.min' => 'The publication year is invalid.',
            'publication_year.max' => 'The publication year cannot be in the future.',
            'isbn.max' => 'The ISBN may not be greater than 20 characters.',
            'stock.required' => 'The stock is required.',
            'stock.integer' => 'The stock must be a number.',
            'stock.min' => 'The stock cannot be less than 0.',
            'category_id.required' => 'The category must be selected.'
        ];
    }
}
