<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAdvertisement extends FormRequest
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
            'name' => 'required|max:50',
            'link' => 'required|max:256|active_url',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:4096',
            'position' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' =>'O campo Resumo pode conter no máximo 50 caractéres.',
            'link.required' => 'O campo Link é obrigatório.',
            'link.max' => 'O campo Link pode conter no máximo 256 caractéres.',
            'link.active_url' => 'O campo Link deve ser uma URL em funcionamento.',
            'image.required' => 'O campo Imagem é obrigatório.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, jpg ou png.',
            'image.max' => 'A Imagem pode conter no máximo 4096 bytes.',
            'position.required' => 'O campo Posição é obrigatório',
            'position.integer' => 'O campo Posição precisa ser um número inteiro.',
        ];
    }
}
