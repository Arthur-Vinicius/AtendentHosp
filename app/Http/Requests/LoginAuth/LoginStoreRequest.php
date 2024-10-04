<?php

namespace App\Http\Requests\LoginAuth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginStoreRequest extends FormRequest
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
            'email' => 'required|string|exists:users|email',
            'password' => [
                'required',
                function ($attribute, $valor, $falha) {
                    $user = User::where('email', $this->input('email'))->first();

                    if (!$user || !Hash::check($valor, $user->password)) {
                        $falha('Senha inválida');
                    }
                },
            ],
            'status' => 'exists:users,status'
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'O campo email é obrigatório.',
            'email.exists' => 'Email inválido.',
            'email.email' => 'O email fornecido é inválido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.exists' => 'Senha invalida.',
        ];
    }
}
