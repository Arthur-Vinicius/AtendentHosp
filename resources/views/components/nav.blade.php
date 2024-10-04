<nav class="navbar navbar-expand navbar-light bg-light m-0 p-0 flex-column">
    {{-- Barra superior verde com logo unimed --}}
    <div id="topbar" class="w-100 d-flex gap-2 justify-content-center pt-3 pb-3">
        <img id="logo" src="/img/logo_unimed.png" alt="Logo da empresa unimed">
    </div>
    <div class="container pb-2 pt-2">
        <!-- Logo Unimed-->
        <a href="{{ route('user.list') }}" class="bi bi-house-fill icon-nav-top avisited"> Início </a>

        <!-- Menu Hamburguer Lateral-->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu de navegação -->
        <div class="collapse navbar-collapse justify-content-end" id="navegacao">
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    {{-- O nome do usuario logado na sessão é obtido pelo metodo Auth::user() --}}
                    <a href="" class="bi bi-person-circle icon-nav-top nav-link dropdown avisited"
                        data-toggle="dropdown"> Olá, {{ Auth::user()->name }}. </a>

                    <div class="dropdown-menu">
                        <a href="{{ route('user.perfil') }}" class="dropdown-item">
                            <span class="bi bi-person icon-nav-top nav-link" style="color: #000;"> Perfil </span>
                        </a>

                        <form class="form-inline nav-link dropdown-item" action="{{ route('login.post.logout') }}"
                            method="post">
                            @csrf
                            <button type="submit" class="dropdown-item icon-nav-top bi bi-box-arrow-right"> Sair
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
