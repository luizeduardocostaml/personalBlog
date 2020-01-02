<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePost extends FormRequest
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
            'title' => 'required',
            'resume' => 'required',
            'text' => 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo Título é obrigatório.',
            'resume.required' => 'O campo Resumo é obrigatório.',
            'text.required' => 'O campo Texto é obrigatório.',
            'image.required' => 'O campo Imagem é obrigatório.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, jpg ou png.',
            'image.max' => 'A Imagem pode conter no máximo 4096 bytes.',
        ];
    }
}
