<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->check() && auth()->user()->permission == 'admin') {
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
            'title' => ['required', 'unique:musics'],
            'content' => ['required', 'min:15', 'max:5000'],
            'cover' => 'required|image|max:2048|dimensions:min_width=100,min_height=100',
            'music' => 'required|mimes:mp3',
            'menu_id' => ['integer', 'required'],
            'singer_id' => ['integer', 'required'],
        ];
    }
}
