<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{

    public function index()
    {
        // Busca o usuário por id, informação vinda do banco, via model.
        $user = User::get();

        // retorna a view e passa a variavel $user para esta view.
        return view('users.user_list', [
            'usuario' => $user]);
    }

    public function showUserInfos(string $id)
    {

        $user = User::find($id);

        // se o usuário for inexistente retorna o model de NotFund - Erro {Deve ser melhorado!}
        // object calistenic
        if(!$user) return Throw new ModelNotFoundException();

        $user = User::find($id);

        return view('users.user_info', [
            'user' => $user]);
    }

    public function create()
    {
        // Busca o usuário por id, informação vinda do banco, via model.
        return view('users.user_cadastrar');
    }

    //UserStoreRequest classe criada para validadar informações.
    public function store(UserStoreRequest $request)
    {
        // $data recebe as informações dos campos dentro do array, os campos são buscados pelo atributo name.
        $data = $request->only(['name','email','password','status', 'cpf', 'confPassword']);

        // Verifica se o campo status recebe o valor 0 ou 1
        $data['status'] = $request->has('status') ? 1 : 0;

        $data['password'] = $request->password;

        User::create($data);

        Toastr::success('Usuario cadastrado!', 'Title', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function update(Request $request,  $id)
    {
        // Declara que a variavel $data tem apenas os valores da requeste selecionados.
        $data = $request->only(['name','email','cpf','status']);

        // Verifica se o campo status recebe o valor 0 ou 1
        $data['status'] = $request->has('status') ? 1 : 0;

        //método filled verifica se a senha foi preenchida, se sim a variavel senha é incluida para ser enviada, pelo array $data
        if ($request->filled('password')) {
            $data['password'] = ($request->password);
        }

        // Busca o usuário por id, informação vinda do banco, via model.
        $user = User::find($id);

        // O metodo update atualiza as informações incluidas na variavel $data, no usuário que corresponde ao $id buscado pelo find acima.
        $user->update($data);

        // Retorna o redirecionamento para a pagina anterior (o proprio formulario)
        return redirect()->back();

    }

    public function destroy(string $id)
    {
        // Busca o usuário por id, informação vinda do banco, via model.
        $user = User::find($id);

        // $user rececbe a função de deleção.
        $user->delete();

        return redirect()->back();
    }

    public function pesquisa()
    {
        $pesquisa = request('pesquisa');

        // se existir pesquisa retorna os usuarios onde existir caracteres definidos na busca.
        if($pesquisa){
            $user = User::where(
                'name', 'like', '%'.$pesquisa.'%'
            )->orWhere('email', 'like', '%'.$pesquisa.'%')->get();
        }

        return view('users.user_list_search', [
            'user' => $user, 'pesquisa' => $pesquisa]);
    }

    public function perfil(){

        // Define que a variavel recebe o usuario logado na sessão.
        $userSessionOn = Auth::user();

        return view('users.user_perfil', [
            'user' => $userSessionOn]);
    }

}
