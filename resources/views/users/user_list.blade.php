@extends('layout.main')

@include('components.nav')

@section('content')

@section('pagename', 'lista de usuários')

@section('meta',
    'Página principal do sistema Portal Unimed HU, nesta página são listados os usuarios cadastrados no sistema, bem como informações e opções para edição e exclusão.')

<p class="mb-5 mt-5 ">
    <a class="avisited" href="{{ Route('user.list') }}">Início</a>
    /
    <a class="avisited" href="#">@yield('pagename') </a>
</p>

<p class="my-1">Bem Vindo(a) ao Portal Unimed HU</p>
<div class="col-12 bg-light border rounded mb-5 p-4">

    @include('components.btnCadastrar')

    <h3>Usuários</h3>

    @include('components.btnPesquisar')

    <div id="users-listation" class="users-listation">
        @include('components.tabelaUsuarios')
    </div>
</div>
@endsection
