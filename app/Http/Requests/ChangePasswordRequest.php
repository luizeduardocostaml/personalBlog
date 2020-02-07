<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:newPassword',
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required' => 'O campo Senha é obrigatório.',
            'oldPassword.min' => 'O campo Senha antiga deve conter no mínimo 8 dígitos.',
            'newPassword.required' => 'O campo Senha nova é obrigatório.',
            'newPassword.min' => 'O campo Senha nova deve conter no mínimo 8 dígitos.',
            'confirmPassword.required' => 'O campo Confirme a senha é obrigatório.',
            'confirmPassword.min' => 'O campo Confirme a nova senha deve conter no mínimo 8 dígitos.',
            'confirmPassword.same' => 'O campo Confime a nova senha deve ser igual ao Nova senha.',
        ];
    }
}
