@extends('layouts.app')

@section('title', 'Fazer Pedido - RangoDelivery')

@section('styles')
<style>
    .hero-pedidos { background: linear-gradient(135deg, #1A1A1A, #2d0a00); padding: 4rem 0; color: #fff; }
    .hero-pedidos h1 { font-family: 'Bebas Neue', cursive; font-size: 3rem; }
    .hero-pedidos span { color: var(--primary); }
    .tipo-card { border: 2px solid #eee; border-radius: 1.2rem; padding: 1.5rem; cursor: pointer; transition: all .2s; text-align: center; }
    .tipo-card:hover, .tipo-card.active { border-color: var(--primary); background: rgba(232,50,10,.05); }
    .tipo-card i { font-size: 2rem; color: var(--primary); }
    .item-card { border: none; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0,0,0,.07); }
    .item-img { font-size: 2.5rem; width: 60px; height: 60px; background: var(--gray); border-radius: .7rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .preco { font-family: 'Bebas Neue', cursive; font-size: 1.2rem; color: var(--primary); }
    .carrinho { background: #fff; border-radius: 1.2rem; box-shadow: 0 8px 30px rgba(0,0,0,.10); padding: 1.5rem; position: sticky; top: 80px; }
    .form-control, .form-select { border-radius: .7rem; border: 1.5px solid #eee; }
    .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 .2rem rgba(232,50,10,.15); }
    .qty-btn { width: 30px; height: 30px; border-radius: 50%; border: none; background: var(--gray); font-weight: bold; cursor: pointer; transition: background .2s; }
    .qty-btn.plus { background: var(--primary); color: #fff; }
    .carrinho-item { display: flex; justify-content: space-between; align-items: center; padding: .4rem 0; border-bottom: 1px solid #f0f0f0; font-size: .88rem; }
    .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.5); z-index:9999; align-items:center; justify-content:center; }
    .modal-overlay.show { display:flex; }
    .modal-box { background:#fff; border-radius:1.5rem; padding:2.5rem; text-align:center; max-width:420px; width:90%; animation: popIn .3s ease; }
    @keyframes popIn { from { transform:scale(.8); opacity:0; } to { transform:scale(1); opacity:1; } }
    .success-icon { font-size:4rem; margin-bottom:1rem; }
</style>
@endsection

@section('content')

<section class="hero-pedidos">
    <div class="container text-center">
        <h1>Faça seu <span>Pedido</span></h1>
        <p class="text-white-50">Rápido, fácil e delicioso!</p>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <h5 class="fw-bold mb-3">Tipo de pedido</h5>
        <div class="row gy-3 mb-5">
            @foreach([
                ['bi-truck','Delivery','Receba em casa'],
                ['bi-bag','Retirada','Retire no balcão'],
                ['bi-shop','Local','Consumir no local'],
            ] as $tipo)
            <div class="col-md-4">
                <div class="tipo-card {{ $loop->first ? 'active' : '' }}" onclick="selecionarTipo(this)">
                    <i class="bi {{ $tipo[0] }} d-block mb-2"></i>
                    <div class="fw-bold">{{ $tipo[1] }}</div>
                    <div class="text-muted small">{{ $tipo[2] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row gy-4">
            <div class="col-lg-8">
                <h5 class="fw-bold mb-3">Escolha seus itens</h5>
                <div class="d-flex flex-column gap-3">
                    @php
                    $itens = [
                        ['🍔','Burger Clássico','Pão brioche, carne 180g, queijo','28.90'],
                        ['🍔','Burger Bacon','Pão brioche, carne 180g, bacon e cheddar','34.90'],
                        ['🍔','Burger Duplo','Dois blends de carne e queijo duplo','42.90'],
                        ['🍕','Pizza Margherita','Molho, mussarela e manjericão','42.90'],
                        ['🌮','Combo Tacos','3 tacos com molho especial','32.90'],
                        ['🍟','Batata Frita','Porção crocante com molho','18.90'],
                        ['🥤','Refrigerante','350ml à escolha','8.90'],
                        ['🍰','Brownie','Com sorvete de baunilha','16.90'],
                    ];
                    @endphp
                    @foreach($itens as $i => $item)
                    <div class="card item-card p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="item-img">{{ $item[0] }}</div>
                            <div class="flex-grow-1">
                                <div class="fw-bold">{{ $item[1] }}</div>
                                <div class="text-muted small">{{ $item[2] }}</div>
                                <div class="preco">R$ {{ number_format((float)$item[3], 2, ',', '.') }}</div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="qty-btn" onclick="alterar({{ $i }}, -1)">−</button>
                                <span class="fw-bold" id="qty-{{ $i }}">0</span>
                                <button class="qty-btn plus" onclick="alterar({{ $i }}, 1)">+</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <div class="carrinho">
                    <h5 class="fw-bold mb-3"><i class="bi bi-bag me-2"></i>Seu pedido</h5>
                    <div id="carrinho-vazio" class="text-muted text-center py-3">
                        <i class="bi bi-bag-x fs-2 d-block mb-2"></i>
                        Nenhum item adicionado
                    </div>
                    <div id="carrinho-itens" style="display:none">
                        <div id="lista-carrinho"></div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Endereço de entrega</label>
                        <input type="text" id="endereco" class="form-control" placeholder="Rua, número, bairro">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Pagamento</label>
                        <select id="pagamento" class="form-select">
                            <option>Cartão de crédito</option>
                            <option>Cartão de débito</option>
                            <option>PIX</option>
                            <option>Dinheiro</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <span>Total</span>
                        <span id="total" style="color:var(--primary)">R$ 0,00</span>
                    </div>
                    <button class="btn btn-primary w-100 py-2 fw-bold" onclick="finalizarPedido()">
                        <i class="bi bi-check-circle me-2"></i>Finalizar pedido
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal-overlay" id="modalSucesso">
    <div class="modal-box">
        <div class="success-icon">🎉</div>
        <h4 class="fw-bold mb-2">Pedido realizado!</h4>
        <p class="text-muted mb-1">Seu pedido foi enviado com sucesso.</p>
        <p class="text-muted small mb-4">Tempo estimado: <strong>30-40 minutos</strong></p>
        <div id="resumo-modal" class="text-start bg-light rounded-3 p-3 mb-4 small"></div>
        <button class="btn btn-primary w-100 fw-bold" onclick="fecharModal()">
            <i class="bi bi-house me-2"></i>Voltar ao início
        </button>
    </div>
</div>

@endsection

@section('scripts')
<script>
const produtos = [
    {emoji:'🍔', nome:'Burger Clássico', preco:28.90},
    {emoji:'🍔', nome:'Burger Bacon', preco:34.90},
    {emoji:'🍔', nome:'Burger Duplo', preco:42.90},
    {emoji:'🍕', nome:'Pizza Margherita', preco:42.90},
    {emoji:'🌮', nome:'Combo Tacos', preco:32.90},
    {emoji:'🍟', nome:'Batata Frita', preco:18.90},
    {emoji:'🥤', nome:'Refrigerante', preco:8.90},
    {emoji:'🍰', nome:'Brownie', preco:16.90},
];

const qtds = new Array(produtos.length).fill(0);

function alterar(i, delta) {
    qtds[i] = Math.max(0, qtds[i] + delta);
    document.getElementById('qty-' + i).textContent = qtds[i];
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const lista = document.getElementById('lista-carrinho');
    const vazio = document.getElementById('carrinho-vazio');
    const itensDiv = document.getElementById('carrinho-itens');
    let total = 0;
    let html = '';
    let temItem = false;

    qtds.forEach((q, i) => {
        if (q > 0) {
            temItem = true;
            const subtotal = q * produtos[i].preco;
            total += subtotal;
            html += `<div class="carrinho-item">
                <span>${produtos[i].emoji} ${produtos[i].nome} x${q}</span>
                <span class="fw-bold">R$ ${subtotal.toFixed(2).replace('.',',')}</span>
            </div>`;
        }
    });

    lista.innerHTML = html;
    vazio.style.display = temItem ? 'none' : 'block';
    itensDiv.style.display = temItem ? 'block' : 'none';
    document.getElementById('total').textContent = 'R$ ' + total.toFixed(2).replace('.',',');
}

function selecionarTipo(el) {
    document.querySelectorAll('.tipo-card').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
}

function finalizarPedido() {
    const temItem = qtds.some(q => q > 0);
    if (!temItem) { alert('Adicione pelo menos um item ao pedido!'); return; }

    const tipo = document.querySelector('.tipo-card.active .fw-bold').textContent;
    const endereco = document.getElementById('endereco').value || 'Não informado';
    const pagamento = document.getElementById('pagamento').value;
    const total = document.getElementById('total').textContent;

    let itens = '';
    qtds.forEach((q, i) => {
        if (q > 0) itens += `<div>${produtos[i].emoji} ${produtos[i].nome} x${q}</div>`;
    });

    document.getElementById('resumo-modal').innerHTML = `
        <div class="mb-2"><strong>Tipo:</strong> ${tipo}</div>
        <div class="mb-2"><strong>Itens:</strong>${itens}</div>
        <div class="mb-2"><strong>Endereço:</strong> ${endereco}</div>
        <div class="mb-2"><strong>Pagamento:</strong> ${pagamento}</div>
        <div><strong>Total:</strong> ${total}</div>
    `;

    document.getElementById('modalSucesso').classList.add('show');
}

function fecharModal() {
    document.getElementById('modalSucesso').classList.remove('show');
    qtds.fill(0);
    qtds.forEach((_, i) => document.getElementById('qty-' + i).textContent = 0);
    atualizarCarrinho();
    window.scrollTo(0, 0);
}
</script>
@endsection
