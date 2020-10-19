<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'image' => 'image|mimes:jpeg,png,jpg|max:4096',
            'biography' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'O campo Nome pode conter no máximo 256 caracteres.',
            'image.image' => 'O campo Imagem deve ser uma imagem.',
            'image.mimes' => 'O campo Imagem deve ser no formato: .jpeg, .png ou .jpg.',
            'image.max' => 'A Imagem pode conter no máximo 4096 bytes.',
            'biography.required' => 'O campo Biografia é obrigatório.',
            'biography.max' => 'O campo Biografia pode conter no máximo 1000 caracteres.',
        ];
    }
}
