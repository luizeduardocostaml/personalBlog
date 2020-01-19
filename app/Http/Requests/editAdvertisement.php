<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editAdvertisement extends FormRequest
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
        ];
    }
}
