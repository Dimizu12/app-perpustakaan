<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StroreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'required|string|max:100',
            'nim' => 'required|string|unique:members,nim',
            'email' => 'required|string|email|max:255|unique:members,email',
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
