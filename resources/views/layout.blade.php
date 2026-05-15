<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VITRINE</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>

        /* =========================
           ESTRUTURA GLOBAL
        ========================== */

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* =========================
           NAVBAR
        ========================== */

        .logo-img {
            height: 80px;
            width: auto;
        }

        .navbar-custom {
            background-color: #ffffff;
            min-height: 90px;
            border-bottom: 1px solid #e9ecef;
        }

        .nav-item {
            display: flex;
            align-items: center;
        }

        .user-icon {

            font-size: 28px;
            color: #333 !important;

            transition: 0.3s ease;

        }

        .user-icon:hover {

            color: #000 !important;
            transform: scale(1.05);

        }

        /* =========================
           MENU
        ========================== */

        .menu-link {
            position: relative;

            display: inline-block !important;

            padding: 0 !important;

            margin-left: 15px;

            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;

            color: #333 !important;

            text-decoration: none;

            line-height: normal;
        }

        .menu-link::after {
            content: "";

            position: absolute;

            left: 0;
            bottom: -3px;

            width: 0;
            height: 1px;

            background-color: #000;

            transition: width 0.2s ease;
        }

        .menu-link:hover::after {
            width: 100%;
        }


        /* =========================
           BOTÃO CARRINHO
        ========================== */

        .cart-button {
            margin-left: 20px;
        }

        .cart-btn {
            color: #aa9c05;
            border: 1.5px solid #cfbe04;

            transition: 0.3s ease;
        }

        .cart-btn:hover {
            background-color: #fee702;
            color: #fff;
            border-color: #fee702;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            background: #ffffff;
            border-top: 1px solid #dee2e6;
            padding: 20px 0;
            margin-top: 50px;
        }

        /* =========================
            CAROUSEL
        ========================= */

        .carousel-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* =========================
            CARDS
        ========================= */

        
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom shadow-sm">

        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand" href="{{ route('catalogo') }}">

            <img src="{{ asset('img/logo.jpg') }}"
            alt="Logo"
            class="logo-img">

            </a>

            <!-- BOTÃO MOBILE -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarNav">

    <!-- MENU ESQUERDA -->
    <ul class="navbar-nav align-items-center">

        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ route('catalogo') }}">
                Catálogo
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ route('lojas.index') }}">
                Gerenciar Loja
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ route('produtos.index') }}">
                Produtos
            </a>
        </li>

    </ul>

    <!-- MENU DIREITA -->
<ul class="navbar-nav ms-auto align-items-center">

    <!-- CARRINHO -->
    <li class="nav-item me-3">

        <a class="btn cart-btn position-relative rounded-pill px-4"
           href="{{ route('carrinho.exibir') }}">

            <i class="bi bi-cart3"></i>

            @if(session('carrinho') && count(session('carrinho')) > 0)

                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ count(session('carrinho')) }}
                </span>

            @endif

        </a>

    </li>

    <!-- USUÁRIO -->
    <li class="nav-item dropdown">

        <a class="nav-link user-icon"
           href="#"
           role="button"
           data-bs-toggle="dropdown"
           aria-expanded="false">

            <i class="bi bi-person-circle"></i>

        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

            @guest

                <li>

                    <a class="dropdown-item"
                       href="{{ route('login') }}">

                        Login

                    </a>

                </li>

                <li>

                    <a class="dropdown-item"
                       href="{{ route('register') }}">

                        Registrar

                    </a>

                </li>

            @endguest

            @auth

                <li class="dropdown-item-text fw-bold">

                    {{ Auth::user()->name }}

                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>

                    <a class="dropdown-item"
                       href="{{ route('profile.edit') }}">

                        Meu Perfil

                    </a>

                </li>

                <li>

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                                class="dropdown-item">

                            Sair

                        </button>

                    </form>

                </li>

            @endauth

        </ul>

    </li>

</ul>

    @auth

    @if(auth()->user()->tipo === 'admin')

        <li class="nav-item">

            <a class="nav-link menu-link"
               href="{{ route('usuarios.index') }}">

               Usuários

            </a>

        </li>

    @endif

@endauth

</div>

        </div>

    </nav>

    <!-- CONTEÚDO -->
    <main>
        @yield('conteudo')
    </main>

    <!-- FOOTER -->
    <footer>

        <div class="container text-center">

            <p class="text-muted mb-0 small">
                © 2026 - Projeto P1 ELETIVA - Desenvolvido por Gustavo Henrique
            </p>

        </div>

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>