<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — RangoDelivery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:      #E8320A;
            --primary-dark: #B52508;
            --sidebar-bg:   #1A1A1A;
            --sidebar-w:    260px;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: #F4F6F9;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.4rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,.07);
        }

        .sidebar-brand span {
            font-family: 'Bebas Neue', cursive;
            font-size: 1.6rem;
            color: var(--primary);
        }

        .sidebar-label {
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #555;
            padding: 1.2rem 1.5rem .4rem;
        }

        .sidebar .nav-link {
            color: #bbb;
            padding: .6rem 1.5rem;
            border-radius: .5rem;
            margin: .1rem .7rem;
            font-weight: 600;
            font-size: .92rem;
            display: flex;
            align-items: center;
            gap: .7rem;
            transition: all .2s;
        }

        .sidebar .nav-link i { font-size: 1.1rem; width: 20px; }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,.06);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background: var(--primary);
            color: #fff;
        }

        /* ── TOPBAR ── */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: 64px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            box-shadow: 0 1px 8px rgba(0,0,0,.07);
            z-index: 999;
        }

        .topbar .page-title {
            font-family: 'Bebas Neue', cursive;
            font-size: 1.5rem;
            color: #1A1A1A;
            letter-spacing: .5px;
        }

        /* ── CONTEÚDO ── */
        .main-content {
            margin-left: var(--sidebar-w);
            margin-top: 64px;
            padding: 2rem;
            min-height: calc(100vh - 64px);
        }

        /* ── CARDS STAT ── */
        .stat-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.4rem 1.6rem;
            border: none;
            box-shadow: 0 2px 12px rgba(0,0,0,.06);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: .8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .stat-card .value {
            font-family: 'Bebas Neue', cursive;
            font-size: 2rem;
            line-height: 1;
            color: #1A1A1A;
        }

        .stat-card .label { font-size: .8rem; color: #888; font-weight: 600; }

        /* ── BADGE STATUS ── */
        .badge-pendente   { background:#FFF3CD;color:#856404; }
        .badge-em_preparo { background:#CCE5FF;color:#004085; }
        .badge-entregue   { background:#D4EDDA;color:#155724; }
        .badge-cancelado  { background:#F8D7DA;color:#721C24; }

        @media (max-width: 991px) {
            .sidebar { transform: translateX(-100%); transition: transform .3s; }
            .sidebar.show { transform: translateX(0); }
            .topbar, .main-content { left: 0; margin-left: 0; }
        }
    </style>

    @yield('styles')
</head>
<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand d-flex align-items-center gap-2">
            <i class="bi bi-fire text-danger fs-4"></i>
            <span>RangoDelivery</span>
        </div>

        <div class="sidebar-label">Principal</div>
        <nav class="nav flex-column">
            <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>
            <a href="{{ url('/admin/pedidos') }}" class="nav-link {{ request()->is('admin/pedidos*') ? 'active' : '' }}">
                <i class="bi bi-bag"></i> Pedidos
            </a>
            <a href="{{ url('/admin/reservas') }}" class="nav-link {{ request()->is('admin/reservas*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i> Reservas
            </a>
        </nav>

        <div class="sidebar-label">Cardápio</div>
        <nav class="nav flex-column">
            <a href="{{ url('/admin/produtos') }}" class="nav-link {{ request()->is('admin/produtos*') ? 'active' : '' }}">
                <i class="bi bi-egg-fried"></i> Produtos
            </a>
            <a href="{{ url('/admin/categorias') }}" class="nav-link {{ request()->is('admin/categorias*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Categorias
            </a>
        </nav>

        <div class="sidebar-label">Usuários</div>
        <nav class="nav flex-column">
            <a href="{{ url('/admin/usuarios') }}" class="nav-link {{ request()->is('admin/usuarios*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Usuários
            </a>
            <a href="{{ url('/admin/mesas') }}" class="nav-link {{ request()->is('admin/mesas*') ? 'active' : '' }}">
                <i class="bi bi-table"></i> Mesas
            </a>
        </nav>

        <div class="mt-auto p-3">
            <a href="{{ url('/') }}" class="nav-link text-muted">
                <i class="bi bi-arrow-left-circle"></i> Voltar ao site
            </a>
        </div>
    </aside>

    {{-- TOPBAR --}}
    <header class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm d-lg-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
                <i class="bi bi-list fs-4"></i>
            </button>
            <span class="page-title">@yield('page-title', 'Dashboard')</span>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">Olá, <strong>Admin</strong></span>
            <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center text-white fw-bold"
                 style="width:36px;height:36px">A</div>
        </div>
    </header>

    {{-- CONTEÚDO --}}
    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
