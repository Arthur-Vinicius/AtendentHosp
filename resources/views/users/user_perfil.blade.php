@extends('layout.main')

@include('components.nav')

@section('content')

@section('pagename', 'Perfil de Usuário')

@section('meta',
    'Página de informação do usuário que está logado na sessão, nesta página são apresentadas as
    informações do usuário logado e é permitido que seja realizada a edição destas informações.')

    <p class="mb-5 mt-5 ">
        <a class="avisited" href="{{ Route('user.list') }}">Início</a>
        /
        <a class="avisited" href="#">@yield('pagename') </a>
    </p>

    <div class="col-12 bg-light p-3 border border-gray rounded mb-5">
        <h3> Perfil </h3>
        <div class="p-4 border border-gray rounded my-4">
            <p>Dados Pessoais</p>
            {{-- O form envia as informações para a rota update --}}
            @include('components.formInfos')
        </div>
    </div>

@endsection
