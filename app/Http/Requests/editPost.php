<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editPost extends FormRequest
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
            'title' => 'required|max:50',
            'resume' => 'required|max:400',
            'text' => 'required|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo Título é obrigatório.',
            'title.max' => 'O título pode conter no máximo 50 caractéres.',
            'resume.required' => 'O campo Resumo é obrigatório.',
            'resume.max' => 'O resumeo pode conter no máximo 400 caractéres.',
            'text.required' => 'O campo Texto é obrigatório.',
            'text.max' => 'O texto pode conter no máximo 4000 caractéres.',
        ];
    }
}
