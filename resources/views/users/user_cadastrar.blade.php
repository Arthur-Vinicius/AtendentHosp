@extends('layout.main')

@include('components.nav')

@section('content')

@section('pagename', 'Cadastrar usuários')

@section('meta',
    'Página de Cadastro de usuarios no sistema Portal Unimed HU')

<p class="mb-5 mt-5 ">
    <a class="avisited" href="{{ Route('user.list') }}">Início</a>
    /
    <a class="avisited" href="#"> @yield('pagename') </a>
</p>


<p>Bem Vindo(a) ao Portal Unimed HU</p>


<div class="col-12 bg-light p-3 border border-gray rounded mb-5">
    {!! Toastr::message() !!}
    <h3>Novo usuário</h3>
    <div class="p-4 border border-gray rounded my-4">
        <h4 class="mb-4">Dados Pessoais</h4>
        {{-- O form envia as informações para a rota update --}}
        <form method="post" action="{{ route('user.store') }}">

            {{-- Token de validação para envio de dados pelo post --}}
            @csrf
            <div class="form-row row">
                <div class="mb-3 col-lg-5 col-md-12">
                    {{-- O nome do usuário é inserido automaticamente no campo input puxado pelo value. --}}
                    {{-- Dentro de class é inseriodo a diretiva blade de error para que o erro seja verificado. --}}
                    <label for="name" class="form-label ">Nome</label>

                    {{-- O metodo old mantem o valor no caso de algum valor de outros campos não sejam validos --}}
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}">

                    {{-- Caso o valornão seja valido será apresentado o erro para que possa ser corrigido pelo usuário. --}}
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-4 col-md-12">
                    <label for="email" class="form-label">Email do usuário</label>
                    {{-- O email do usuário é inserido automaticamente no campo input puxado pelo value. --}}
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">
                    {{-- Caso o valor não seja valido será apresentado o erro para que possa ser corrigido pelo usuário. --}}
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-lg-3 col-md-12">
                    <label for="cpf" class="form-label">CPF</label>
                    {{-- Para fins de estetica o placeholder exibe os simbulos asteriscos, porem não é passada a senha no campo input. --}}
                    <input type="text" maxlength="14"
                        class="form-control @error('cpf') is-invalid @enderror cpfRegex" id="cpf"
                        value="{{ old('cpf') }}" name="cpf" placeholder="000.000.000-00">
                    {{-- Caso o valor não seja valido será apresentado o erro para que possa ser corrigido pelo usuário. --}}
                    @error('cpf')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-6 col-md-12">
                    <label for="pass" class="form-label">Senha</label>
                    {{-- Para fins de estetica o placeholder exibe os simbulos asteriscos, porem não é passada a senha no campo input. --}}
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="pass"
                        name="password" placeholder="***********">
                    {{-- Caso o valor não seja valido será apresentado o erro para que possa ser corrigido pelo usuário. --}}
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-6 col-md-12">
                    <label for="pass" class="form-label">Confirmação de senha</label>
                    {{-- Para fins de estetica o placeholder exibe os simbulos asteriscos, porem não é passada a senha no campo input. --}}
                    <input type="password" class="form-control @error('confPassword') is-invalid @enderror"
                        id="confPassword" name="confPassword" placeholder="***********">
                    {{-- Caso o valor não seja valido será apresentado o erro para que possa ser corrigido pelo usuário. --}}
                    @error('confPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Este input determina o estatus, checado é ativo e desmarcado é inativo. --}}
                <div class="mb-3 mb-3 col-lg-6 col-md-12 ">
                    <label class="form-check-label" for="status" value="0">
                        Usuário ativo
                    </label>
                    {{-- O campo status vem checado por padrão. --}}
                    <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                        checked>
                </div>
                <div class="col-12 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Formatador de cpf pontos e hifen --}}
<script type="text/javascript" src="{{ asset('js\formataCpf.js') }}"></script>

@endsection
