<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Fatec - Projeto P1</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .navbar-brand {
            font-weight: bold;
            color: #0d6efd !important;
        }

        footer {
            background: #ffffff;
            border-top: 1px solid #dee2e6;
            padding: 20px 0;
            margin-top: 50px;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('catalogo') }}">
                <i class="bi bi-shop"></i> Minha Loja
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalogo') }}">
                            <i class="bi bi-grid-3x3-gap"></i> Catálogo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lojas.index') }}">
                            <i class="bi bi-gear-fill"></i> Gerenciar Loja
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtos.index') }}">
                            <i class="bi bi-gear"></i> Cadastrar produtos
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-primary position-relative rounded-pill px-3" href="{{ route('carrinho.exibir') }}">
                            <i class="bi bi-cart3"></i> Carrinho
                            @if(session('carrinho') && count(session('carrinho')) > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ count(session('carrinho')) }}
                            </span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('conteudo')
    </main>

    <footer>
        <div class="container text-center">
            <p class="text-muted mb-0 small">
                © 2026 - Projeto P1 Fatec Prudente - Desenvolvido por Henrique
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>