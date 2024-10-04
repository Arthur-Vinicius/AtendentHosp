<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuth\LoginStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function index()
    {
        // Checa se o usuário já está logado e redireciona para a route user.list
        if(Auth::check())
            return redirect()->route('user.list');

        // Caso não esteja redireciona para a pagina de login.
        return view('login.login');
    }

    public function login(LoginStoreRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Buscar o primeiro usuario por email
        $user = User::where('email', $email)->first();

        // Verifica se o status é 1(Ativo)
        if ($user && $user->status == 1) {

            // Busca o usuario que corresponde às credenciais informadas.
            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                // Evita que a sessão fique fixada, regenera a sessão do usuário.
                $request->session()->regenerate();

                // Autenticação bem-sucedida
                return redirect()->route('user.list');
            }else {
                // Autenticação falhou
                return redirect()->route('login.login');
            }
        }else {
            // Autenticação falhou
            return redirect()->route('login.login');
        }
    }


    // faz o logout do usuário
    public function logout(Request $request){
        Auth::logout();

        // Invalida a sessão do usuário e regenera o Token para que o usuário não tenha mais acesso até fazer login novamente.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.login');
    }

}
