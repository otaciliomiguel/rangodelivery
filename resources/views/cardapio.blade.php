@extends('layouts.app')

@section('title', 'Cardápio - RangoDelivery')

@section('styles')
<style>
    .filter-btn { border-radius: 50px; font-weight: 700; }
    .filter-btn.active { background: var(--primary); color: #fff; border-color: var(--primary); }
    .produto-card { border: none; border-radius: 1.2rem; box-shadow: 0 4px 20px rgba(0,0,0,.07); transition: transform .25s, box-shadow .25s; }
    .produto-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(232,50,10,.15); }
    .produto-img { height: 160px; display: flex; align-items: center; justify-content: center; font-size: 4rem; background: var(--gray); }
    .preco { font-family: 'Bebas Neue', cursive; font-size: 1.4rem; color: var(--primary); }
    .hero-cardapio { background: linear-gradient(135deg, #1A1A1A, #2d0a00); padding: 4rem 0; color: #fff; }
    .hero-cardapio h1 { font-family: 'Bebas Neue', cursive; font-size: 3rem; }
    .hero-cardapio span { color: var(--primary); }
</style>
@endsection

@section('content')

<section class="hero-cardapio">
    <div class="container text-center">
        <h1>Nosso <span>Cardápio</span></h1>
        <p class="text-white-50">Escolha seu favorito e peça agora!</p>
    </div>
</section>

<section class="py-5">
    <div class="container">

        {{-- Filtros --}}
        <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
            @foreach(['Todos','🍔 Burgers','🍕 Pizzas','🌮 Tacos','🍟 Porções','🥤 Bebidas','🍰 Sobremesas'] as $cat)
            <button class="btn btn-outline-secondary filter-btn {{ $loop->first ? 'active' : '' }}">{{ $cat }}</button>
            @endforeach
        </div>

        {{-- Produtos --}}
        <div class="row gy-4">
            @foreach([
                ['🍔','Burger Clássico','Pão brioche, carne 180g, queijo, alface e tomate','R$ 28,90','Burgers'],
                ['🍔','Burger Bacon','Pão brioche, carne 180g, bacon crocante e cheddar','R$ 34,90','Burgers'],
                ['🍔','Burger Duplo','Dois blends de carne, queijo duplo e molho especial','R$ 42,90','Burgers'],
                ['🍕','Pizza Margherita','Molho de tomate, mussarela e manjericão','R$ 42,90','Pizzas'],
                ['🍕','Pizza Calabresa','Molho, mussarela e calabresa fatiada','R$ 44,90','Pizzas'],
                ['🌮','Combo Tacos','3 tacos recheados com molho especial','R$ 32,90','Tacos'],
                ['🍟','Batata Frita','Porção crocante com molho à escolha','R$ 18,90','Porções'],
                ['🍟','Onion Rings','Anéis de cebola empanados e fritos','R$ 22,90','Porções'],
                ['🥤','Refrigerante','Coca-Cola, Guaraná ou Sprite 350ml','R$ 8,90','Bebidas'],
                ['🥤','Suco Natural','Laranja, limão ou maracujá 500ml','R$ 12,90','Bebidas'],
                ['🍰','Brownie','Brownie de chocolate com sorvete','R$ 16,90','Sobremesas'],
                ['🍰','Cheesecake','Fatia de cheesecake com calda de frutas','R$ 18,90','Sobremesas'],
            ] as $p)
            <div class="col-sm-6 col-lg-3">
                <div class="card produto-card h-100">
                    <div class="produto-img">{{ $p[0] }}</div>
                    <div class="card-body p-3">
                        <span class="badge bg-light text-muted small mb-1">{{ $p[4] }}</span>
                        <h6 class="fw-bold mb-1">{{ $p[1] }}</h6>
                        <p class="text-muted small mb-2">{{ $p[2] }}</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <span class="preco">{{ $p[3] }}</span>
                            <a href="{{ url('/pedidos') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus"></i> Pedir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>
@endsection
