<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            //
            'name' => 'string|required|regex:/^[^0-9]+$/',
            'email' => 'email|required|unique:users',
            'password' => 'required|string',
            'confPassword' => 'required|same:password',
            'cpf' => 'max:14|required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'
        ];
    }

    public function messages()
    {
        return [
            //
            'name.string' => 'O nome deve ser valido.',
            'name.regex' => 'O nome não deve conter números.',
            'email' => 'O email deve ser valido.',
            'required' => 'Este campo é obrigatorio.',
            'confPassword.same' => 'As senhas devem ser iguais.',
            'same' => 'As senhas devem ser iguais.',
            'cpf.max' => 'O CPF deve ter no máximo 14 caracteres.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.regex' => 'O CPF deve estar no formato xxx.xxx.xxx-xx.'
        ];
    }

}
