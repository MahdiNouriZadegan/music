<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->user()->permission == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required'],
            'description' => ['required', 'min:10', 'max:200', 'string'],
            'email' => ['email', 'required'],
            'phone'=>['required', 'min:11', 'max:11'],
            'logo'=>'required|image|max:2048'
        ];
    }
}
