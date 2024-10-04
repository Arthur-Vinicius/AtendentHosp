@extends('layout.main')

@include('components.nav')

@section('content')

@section('pagename', 'Pesquisa de usuários')

@section('meta', 'Página de resultado da busca de usuários realizada pelo campo de busca.')

<p class="mb-5 mt-5 ">
    <a class="avisited" href="{{ Route('user.list') }}">Início</a>
    /
    <a class="avisited" href="{{ route('user.list') }}"> lista de usuários </a>
    /
    <a class="avisited" href="#"> @yield('pagename')</a>
</p>

<p class="my-1">Bem Vindo(a) ao Portal Unimed HU</p>
<div class="col-12 bg-light p-3 border rounded mb-5">

    @include('components.btnCadastrar')

    <h3>Usuários</h3>

    @include('components.btnPesquisar')


    <div id="users-listation" class="users-listation container col-md-12 m-0 p-0">
        @include('components.tabelaUsuarios')
    </div>
</div>
@endsection
