<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->check()) {
            return false;
        }
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
            'name'=>['required', 'min:3', 'max:20', 'regex:/^[a-zA-Z0-9ا-ی ]*$/', 'unique:users'],
            'email'=>['required', 'min:10', 'email', 'unique:users'],
            'password'=>['required','confirmed', 'min:6', 'max:20'],
            'password_confirmation'=>['required']
        ];
    }
}
