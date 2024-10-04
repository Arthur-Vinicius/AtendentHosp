@extends('layout.main')

@section('meta',
    'Página de login do sistema Portal Unimed HU')

@section('content')

    {{-- TODO - Validar informações de login. --}}
    {{-- Centralizar e Estilizar formulario de login--}}

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div id="formlogin" class="d-flex justify-content-center align-items-center p-4 col-sm-10 col-md-6 col-lg-5 col-xl-4">
            <form method="post"  action="{{route('login.post.login')}}" autocomplete="off">
                @csrf
                <div class="form-group">
                    <div class="text-center">
                        <img src="/img/logo_unimed.png" alt="Logo" id="logo">
                        <h3 class="mt-4 mb-4">Portal Unimed HU</h3>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label @error('password') is-invalid @enderror">Senha</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                        @error('password')
                            <div class="invalid-feedback mb-4">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 mb-3 text-center justify-content-center">
                        <input type="submit" value="Entrar" class=" btn btn-primary borderBtnRounded mb-3 mt-5">
                        <a href="{{route('login.redefinirSenha')}}" id="corTextoVerde">Esqueci minha senha</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
