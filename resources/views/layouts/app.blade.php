<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RangoDelivery')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:     #E8320A;
            --primary-dark:#B52508;
            --secondary:   #FF6B35;
            --dark:        #1A1A1A;
            --light:       #FFF8F5;
            --gray:        #F5F0ED;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }

        /* ── NAVBAR ── */
        .navbar-brand span {
            font-family: 'Bebas Neue', cursive;
            font-size: 1.8rem;
            color: var(--primary);
            letter-spacing: 1px;
        }

        .navbar {
            background: #fff;
            box-shadow: 0 2px 12px rgba(232,50,10,.10);
            padding: 0.6rem 0;
        }

        .navbar .nav-link {
            font-weight: 700;
            color: var(--dark) !important;
            transition: color .2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--primary) !important;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            font-weight: 700;
            border-radius: 50px;
            padding: .45rem 1.4rem;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            font-weight: 700;
            border-radius: 50px;
            padding: .45rem 1.4rem;
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            color: #aaa;
        }

        footer a { color: #aaa; text-decoration: none; }
        footer a:hover { color: var(--secondary); }
        footer .brand { font-family: 'Bebas Neue', cursive; color: var(--primary); font-size: 1.6rem; }
    </style>

    @yield('styles')
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <i class="bi bi-fire text-danger fs-4"></i>
                <span>RangoDelivery</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cardapio*') ? 'active' : '' }}" href="{{ url('/cardapio') }}">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('reservas*') ? 'active' : '' }}" href="{{ url('/reservas') }}">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sobre*') ? 'active' : '' }}" href="{{ url('/sobre') }}">Sobre</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary" href="{{ url('/pedidos') }}">
                            <i class="bi bi-bag me-1"></i> Fazer Pedido
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTEÚDO --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="py-5 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="brand mb-2"><i class="bi bi-fire"></i> RangoDelivery</div>
                    <p class="small">Sabor e agilidade na sua mesa ou na sua porta. Peça já!</p>
                </div>
                <div class="col-md-2">
                    <h6 class="text-white fw-bold mb-3">Menu</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ url('/') }}">Início</a></li>
                        <li><a href="{{ url('/cardapio') }}">Cardápio</a></li>
                        <li><a href="{{ url('/reservas') }}">Reservas</a></li>
                        <li><a href="{{ url('/sobre') }}">Sobre</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="text-white fw-bold mb-3">Contato</h6>
                    <ul class="list-unstyled small">
                        <li><i class="bi bi-telephone me-1"></i> (11) 99999-9999</li>
                        <li><i class="bi bi-envelope me-1"></i> contato@rangodelivery.com</li>
                        <li><i class="bi bi-geo-alt me-1"></i> Rua do Sabor, 123</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="text-white fw-bold mb-3">Redes Sociais</h6>
                    <div class="d-flex gap-3 fs-4">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary mt-4">
            <p class="text-center small mb-0">© {{ date('Y') }} RangoDelivery. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
