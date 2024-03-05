<?php

namespace App\Http\Requests\LoginRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class LoginRequest extends FormRequest
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
            'login' => 'required',
            'password' => 'required'
        ];
    }
    public function attributes(): array
    {
        return [
            'login' => 'Username or Email',
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'The User name or Email is required.',
            'password.required' => 'The password is required.',
        ];
    }
}
