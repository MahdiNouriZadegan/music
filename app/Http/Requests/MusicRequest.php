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
            'title'=>['required', 'unique:musics'],
            'content'=>['required', 'min:15', 'max:5000'],
            'commentable'=>['integer'],
            'reactionable'=>['integer'],
            'cover'=>'required|image|max:2048|dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
            'music'=>'required|mimes:application/octet-stream,audio/mp3',
            'menu_id'=>['integer', 'required'],
            'singer_id'=>['integer', 'required'],
        ];
    }
}
