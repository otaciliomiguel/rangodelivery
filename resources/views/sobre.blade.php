@extends('layouts.app')

@section('title', 'Sobre - RangoDelivery')

@section('styles')
<style>
    .hero-sobre { background: linear-gradient(135deg, #1A1A1A, #2d0a00); padding: 5rem 0; color: #fff; }
    .hero-sobre h1 { font-family: 'Bebas Neue', cursive; font-size: 3.5rem; }
    .hero-sobre span { color: var(--primary); }
    .valor-card { background: #fff; border-radius: 1.2rem; padding: 2rem; box-shadow: 0 4px 20px rgba(0,0,0,.07); text-align: center; }
    .valor-icon { font-size: 2.5rem; margin-bottom: 1rem; }
    .time-card { border-left: 4px solid var(--primary); padding-left: 1.5rem; margin-bottom: 2rem; }
    .numero { font-family: 'Bebas Neue', cursive; font-size: 3rem; color: var(--primary); line-height: 1; }
</style>
@endsection

@section('content')

<section class="hero-sobre">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>Sobre o <span>RangoDelivery</span></h1>
                <p class="text-white-50 fs-5">Nascemos da paixão por comida boa e entrega rápida. Desde 2020, levamos sabor e alegria para milhares de clientes.</p>
                <a href="{{ url('/cardapio') }}" class="btn btn-primary btn-lg mt-3">Ver cardápio</a>
            </div>
            <div class="col-lg-6 text-center" style="font-size:10rem">🍔</div>
        </div>
    </div>
</section>

{{-- Números --}}
<section class="py-5" style="background:var(--gray)">
    <div class="container">
        <div class="row text-center gy-4">
            @foreach([['500+','Pedidos por dia'],['4.9★','Avaliação média'],['3+','Anos de história'],['50+','Itens no cardápio']] as $n)
            <div class="col-6 col-md-3">
                <div class="numero">{{ $n[0] }}</div>
                <div class="text-muted fw-semibold">{{ $n[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Nossa história --}}
<section class="py-5">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Nossa <span style="color:var(--primary)">história</span></h2>
                <div class="time-card">
                    <div class="fw-bold">2020 — O começo</div>
                    <p class="text-muted small mb-0">Começamos com uma cozinha pequena e muita vontade de fazer a diferença no mercado de delivery.</p>
                </div>
                <div class="time-card">
                    <div class="fw-bold">2021 — Expansão</div>
                    <p class="text-muted small mb-0">Ampliamos o cardápio e abrimos nosso primeiro espaço físico para atendimento local e reservas.</p>
                </div>
                <div class="time-card">
                    <div class="fw-bold">2023 — Plataforma própria</div>
                    <p class="text-muted small mb-0">Lançamos nossa plataforma digital para pedidos online, com rastreamento em tempo real.</p>
                </div>
                <div class="time-card">
                    <div class="fw-bold">Hoje — Referência</div>
                    <p class="text-muted small mb-0">Somos referência em sabor, agilidade e atendimento na nossa região.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Nossos <span style="color:var(--primary)">valores</span></h2>
                <div class="row gy-3">
                    @foreach([
                        ['❤️','Paixão','Colocamos amor em cada prato preparado.'],
                        ['⚡','Agilidade','Entrega rápida sem abrir mão da qualidade.'],
                        ['🌿','Qualidade','Ingredientes frescos e selecionados.'],
                        ['😊','Satisfação','Seu sorriso é nossa maior recompensa.'],
                    ] as $v)
                    <div class="col-6">
                        <div class="valor-card">
                            <div class="valor-icon">{{ $v[0] }}</div>
                            <div class="fw-bold mb-1">{{ $v[1] }}</div>
                            <div class="text-muted small">{{ $v[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Time --}}
<section class="py-5" style="background:var(--gray)">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Nosso <span style="color:var(--primary)">time</span></h2>
        <div class="row gy-4 justify-content-center">
            @foreach([
                ['👨‍🍳','Carlos Silva','Chef Principal'],
                ['👩‍💼','Ana Souza','Gerente de Operações'],
                ['👨‍💻','Lucas Lima','Tecnologia'],
            ] as $m)
            <div class="col-md-3">
                <div style="font-size:4rem">{{ $m[0] }}</div>
                <div class="fw-bold mt-2">{{ $m[1] }}</div>
                <div class="text-muted small">{{ $m[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
