<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'email' => 'required|email|max:50',
            'title' => 'required|max:50',
            'text' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' => 'O campo Nome pode conter no máximo 50 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail não está no formato correto.',
            'email.max' => 'O campo E-mail pode conter no máximo 256 caracteres.',
            'title.required' => 'O campo Assunto é obrigatório.',
            'title.max' => 'O campo Assunto pode conter no máximo 50 caracteres.',
            'text.required' => 'O campo Mensagem é obrigatório.',
            'text.max' => 'O campo Mensagem pode conter no máximo 1000 caracteres.',
        ];
    }
}
