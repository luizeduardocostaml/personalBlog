<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeMessage extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'title.required' => 'O campo Assunto é obrigatório.',
            'text.required' => 'O campo Mensagem é obrigatório.',
            'email.email' => 'O campo E-mail não está no formato correto.',
        ];
    }
}
