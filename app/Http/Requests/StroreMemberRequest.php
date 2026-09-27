<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StroreMemberRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'nim' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone_num' => 'required|string|digits_between:4,15', //make this to number data type that can zero as the first input
            'address' => 'required|string',
            'status' => 'required|string',
        ];
    }

    public function massage(): array {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name may not be greater than 100 characters.',
            'nim.required' => 'NIM is required.',
            'nim.string' => 'NIM must be number.',
            'email.required' => 'Email is required.',
            'email.email' => 'Use the standard email.',
            'email.max' => 'Email may not be greater than 255 characters.',
            'phone_num.required' => 'Telephone number is required.',
            'phone_num.integer' => 'Telephone number must be number.',
            'phone_num.digits_between' => 'Telephone number must within 4 - 15 digits.',
            'address.required' => 'Address is required.',
            'status.required' => 'Status is required.',
        ];
    }
}
