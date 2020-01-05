<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerUser extends FormRequest
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
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'O campo ID é obrigatório.',
            'username.unique' => 'Este ID já existe, tente outro.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.min' => 'O campo Senha deve conter no mínimo 8 dígitos.',
        ];
    }
}
