<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'text' => 'required|max:30000',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo Título é obrigatório.',
            'title.max' => 'O campo Título pode conter no máximo 50 caracteres.',
            'resume.required' => 'O campo Resumo é obrigatório.',
            'resume.max' => 'O Resumo pode conter no máximo 400 caracteres.',
            'text.required' => 'O campo Texto é obrigatório.',
            'text.max' => 'O texto pode conter no máximo 30000 caracteres.',
            'image.required' => 'O campo Imagem é obrigatório.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser no formato: .jpeg, .jpg ou .png.',
            'image.max' => 'A Imagem pode conter no máximo 4096 bytes.',
        ];
    }
}
