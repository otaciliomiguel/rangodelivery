@extends('layouts.admin')
@section('title','Produtos')
@section('page-title','Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <button class="btn btn-primary" style="border-radius:50px">
        <i class="bi bi-plus me-1"></i> Novo produto
    </button>
</div>

<div class="row gy-3">
    @foreach([
        ['🍔','Burger Clássico','Burgers','R$ 28,90',true],
        ['🍔','Burger Bacon','Burgers','R$ 34,90',true],
        ['🍔','Burger Duplo','Burgers','R$ 42,90',true],
        ['🍕','Pizza Margherita','Pizzas','R$ 42,90',true],
        ['🍕','Pizza Calabresa','Pizzas','R$ 44,90',false],
        ['🌮','Combo Tacos','Tacos','R$ 32,90',true],
        ['🍟','Batata Frita','Porções','R$ 18,90',true],
        ['🥤','Refrigerante','Bebidas','R$ 8,90',true],
    ] as $p)
    <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center gap-3">
                <div style="font-size:2.5rem;width:56px;height:56px;background:var(--gray);border-radius:.8rem;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                    {{ $p[0] }}
                </div>
                <div class="flex-grow-1">
                    <div class="fw-bold">{{ $p[1] }}</div>
                    <div class="text-muted small">{{ $p[2] }}</div>
                    <div style="font-family:'Bebas Neue',cursive;color:var(--primary)">{{ $p[3] }}</div>
                </div>
                <div class="d-flex flex-column align-items-end gap-2">
                    <span class="badge {{ $p[4] ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                        {{ $p[4] ? 'Disponível' : 'Indisponível' }}
                    </span>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-outline-primary" style="border-radius:50px"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger" style="border-radius:50px"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
