@extends('layouts.app')

@section('title', 'RangoDelivery - Sabor na sua porta')

@section('styles')
<style>
    /* ── HERO ── */
    .hero {
        background: linear-gradient(135deg, #1A1A1A 0%, #2d0a00 100%);
        min-height: 92vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 70% 50%, rgba(232,50,10,.25) 0%, transparent 70%);
    }

    .hero-title {
        font-family: 'Bebas Neue', cursive;
        font-size: clamp(3.5rem, 8vw, 7rem);
        line-height: 1;
        color: #fff;
    }

    .hero-title span { color: var(--primary); }

    .hero-subtitle {
        font-size: 1.15rem;
        color: #ccc;
        max-width: 480px;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        background: rgba(232,50,10,.15);
        border: 1px solid rgba(232,50,10,.4);
        color: var(--secondary);
        border-radius: 50px;
        padding: .3rem .9rem;
        font-size: .82rem;
        font-weight: 700;
        letter-spacing: .5px;
        text-transform: uppercase;
        margin-bottom: 1.2rem;
    }

    .hero-img {
        width: 100%;
        max-width: 520px;
        border-radius: 2rem;
        box-shadow: 0 40px 80px rgba(0,0,0,.5);
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-14px); }
    }

    .hero-stats {
        display: flex;
        gap: 2rem;
        margin-top: 2rem;
    }

    .hero-stat strong {
        font-family: 'Bebas Neue', cursive;
        font-size: 2rem;
        color: var(--primary);
        display: block;
        line-height: 1;
    }

    .hero-stat span { color: #aaa; font-size: .85rem; }

    /* ── COMO FUNCIONA ── */
    .step-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        color: #fff;
        margin: 0 auto 1rem;
        box-shadow: 0 8px 24px rgba(232,50,10,.3);
    }

    /* ── CATEGORIAS ── */
    .cat-card {
        background: #fff;
        border-radius: 1.2rem;
        padding: 1.5rem;
        text-align: center;
        border: 2px solid transparent;
        transition: all .25s;
        cursor: pointer;
        text-decoration: none;
        color: var(--dark);
        display: block;
    }

    .cat-card:hover {
        border-color: var(--primary);
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(232,50,10,.15);
        color: var(--primary);
    }

    .cat-icon { font-size: 2.5rem; margin-bottom: .5rem; }

    /* ── DESTAQUES ── */
    .produto-card {
        background: #fff;
        border-radius: 1.2rem;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 20px rgba(0,0,0,.07);
        transition: transform .25s, box-shadow .25s;
    }

    .produto-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(232,50,10,.15);
    }

    .produto-card .preco {
        font-family: 'Bebas Neue', cursive;
        font-size: 1.5rem;
        color: var(--primary);
    }

    .produto-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }

    /* ── SEÇÃO CTA ── */
    .cta-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 2rem;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '🍔';
        position: absolute;
        right: -1rem;
        bottom: -2rem;
        font-size: 12rem;
        opacity: .08;
    }

    /* ── SECTION TITLE ── */
    .section-title {
        font-family: 'Bebas Neue', cursive;
        font-size: 2.6rem;
        letter-spacing: .5px;
    }

    .section-title span { color: var(--primary); }
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="container position-relative z-1">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <div class="hero-badge">
                    <i class="bi bi-lightning-charge-fill"></i> Entrega em até 40 min
                </div>
                <h1 class="hero-title">
                    Sabor que<br><span>chega até</span><br>você!
                </h1>
                <p class="hero-subtitle mt-3">
                    Peça online, retire no balcão ou receba em casa.
                    Comida boa, rápida e sem complicação.
                </p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ url('/pedidos') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-bag-fill me-2"></i> Pedir agora
                    </a>
                    <a href="{{ url('/cardapio') }}" class="btn btn-outline-light btn-lg" style="border-radius:50px">
                        Ver cardápio
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <strong>500+</strong>
                        <span>Pedidos/dia</span>
                    </div>
                    <div class="hero-stat">
                        <strong>4.9★</strong>
                        <span>Avaliação</span>
                    </div>
                    <div class="hero-stat">
                        <strong>30min</strong>
                        <span>Entrega média</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="produto-img hero-img mx-auto" style="height:380px;background:rgba(255,255,255,.05);border-radius:2rem;font-size:10rem;display:flex;align-items:center;justify-content:center;">
                    🍔
                </div>
            </div>
        </div>
    </div>
</section>

{{-- COMO FUNCIONA --}}
<section class="py-6 py-5 mt-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Como <span>funciona?</span></h2>
            <p class="text-muted">Simples, rápido e sem complicação</p>
        </div>
        <div class="row gy-4 text-center">
            <div class="col-md-4">
                <div class="step-icon"><i class="bi bi-search"></i></div>
                <h5 class="fw-bold">1. Escolha</h5>
                <p class="text-muted small">Explore o cardápio e escolha o que quiser — burgers, combos, bebidas e muito mais.</p>
            </div>
            <div class="col-md-4">
                <div class="step-icon"><i class="bi bi-bag-check"></i></div>
                <h5 class="fw-bold">2. Peça</h5>
                <p class="text-muted small">Faça seu pedido online em segundos. Delivery, retirada ou consumo no local.</p>
            </div>
            <div class="col-md-4">
                <div class="step-icon"><i class="bi bi-emoji-smile"></i></div>
                <h5 class="fw-bold">3. Aproveite</h5>
                <p class="text-muted small">Acompanhe seu pedido em tempo real e receba seu rango fresquinho!</p>
            </div>
        </div>
    </div>
</section>

{{-- CATEGORIAS --}}
<section class="py-5" style="background:var(--gray)">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nossas <span>categorias</span></h2>
        </div>
        <div class="row gy-3 justify-content-center">
            @foreach([
                ['🍔','Burgers'],['🍕','Pizzas'],['🌮','Tacos'],
                ['🍟','Porções'],['🥤','Bebidas'],['🍰','Sobremesas']
            ] as $cat)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ url('/cardapio') }}" class="cat-card">
                    <div class="cat-icon">{{ $cat[0] }}</div>
                    <div class="fw-bold small">{{ $cat[1] }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- DESTAQUES --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Mais <span>pedidos</span></h2>
            <p class="text-muted">Os favoritos dos nossos clientes</p>
        </div>
        <div class="row gy-4">
            @foreach([
                ['🍔','Burger Clássico','Pão brioche, carne 180g, queijo, alface e tomate','R$ 28,90'],
                ['🍔','Burger Bacon','Pão brioche, carne 180g, bacon crocante e cheddar','R$ 34,90'],
                ['🌮','Combo Tacos','3 tacos recheados com molho especial da casa','R$ 32,90'],
                ['🍕','Pizza Margherita','Molho de tomate, mussarela e manjericão fresco','R$ 42,90'],
            ] as $p)
            <div class="col-md-6 col-lg-3">
                <div class="produto-card">
                    <div class="produto-img">{{ $p[0] }}</div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">{{ $p[1] }}</h6>
                        <p class="text-muted small mb-2">{{ $p[2] }}</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="preco">{{ $p[3] }}</span>
                            <a href="{{ url('/pedidos') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/cardapio') }}" class="btn btn-outline-primary">Ver cardápio completo</a>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5">
    <div class="container">
        <div class="cta-section p-5 text-center">
            <h2 class="section-title text-white">Reserve sua <span style="color:#FFD700">mesa</span> agora!</h2>
            <p class="text-white-50 mb-4">Garanta seu lugar e venha viver a experiência RangoDelivery.</p>
            <a href="{{ url('/reservas') }}" class="btn btn-light btn-lg fw-bold" style="border-radius:50px;color:var(--primary)">
                <i class="bi bi-calendar-check me-2"></i> Fazer reserva
            </a>
        </div>
    </div>
</section>

@endsection
