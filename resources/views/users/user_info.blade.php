@extends('layout.main')

@include('components.nav')

@section('content')

@section('pagename', 'Informações do usuário')

@section('meta', 'Página de informação do usuário selecionado, nesta página são apresentadas as informações do usuário e
    é permitido que seja realizada a edição destas informações.')

    <p class="mb-5 mt-5 ">
        <a class="avisited" href="{{ Route('user.list') }}">Início</a>
        /
        <a class="avisited" href="#">@yield('pagename') </a>
    </p>

    <p class="my-1">Bem Vindo(a) ao Portal Unimed HU</p>
    <div class="col-12 bg-light p-3 border rounded mb-5">

        @include('components.btnCadastrar')

        <h3>Informações do usuário</h3>

        @include('components.pesquisar')


        <form method="post" action="{{ route('user.update', $user->id) }}">

            @csrf

            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label ">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control cpfRegex" maxlength="14" id="cpf" name="cpf"
                    value="{{ $user->cpf }}">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="***********">
            </div>
            <div class="mb-3 mb-3 col-lg-6 col-md-12 ">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                    @if ($user->status) checked @endif>
                <label class="form-check-label" for="status">
                    Usuário ativo
                </label>
            </div>
            <div class="col-12 d-flex flex-row-reverse">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </form>
    </div>

    {{-- Formatador de cpf pontos e hifen --}}
    <script type="text/javascript" src="{{ asset('js\formataCpf.js') }}"></script>
@endsection
