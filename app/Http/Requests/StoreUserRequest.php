<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users|max:256',
            'password' => 'required|min:8|max:256',
            'email' => 'required|email|max:256',
            'name' => 'required|max:256',
            'role' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'biography' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'O campo Username é obrigatório.',
            'username.unique' => 'Este Username já existe, tente outro.',
            'username.max' => 'O campo Username pode conter no máximo 256 caracteres.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.min' => 'O campo Senha deve conter no mínimo 8 caracteres.',
            'password.max' => 'O campo Senha pode conter no máximo 256 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail não está no formato correto.',
            'name.required' => 'O campo Nome é obrigatório',
            'name.max' => 'O campo Nome pode conter no máximo 256 caracteres.',
            'role.required' => 'O campo Cargo é obrigatório.',
            'image.required' => 'O campo Imagem é obrigatório.',
            'image.image' => 'O campo Imagem deve ser uma imagem.',
            'image.mimes' => 'O campo Imagem deve ser no formato: .jpeg, .png ou .jpg.',
            'image.max' => 'A Imagem pode conter no máximo 4096 bytes.',
            'biography.required' => 'O campo Biografia é obrigatório.',
            'biography.max' => 'O campo Biografia pode conter no máximo 1000 caracteres.',
        ];
    }
}
