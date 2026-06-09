@extends('layouts.admin')
@section('title','Pedidos')
@section('page-title','Pedidos')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center pt-3">
        <h6 class="fw-bold mb-0">Todos os pedidos</h6>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" style="width:auto;border-radius:50px">
                <option>Todos os status</option>
                <option>Pendente</option>
                <option>Em preparo</option>
                <option>Saiu entrega</option>
                <option>Entregue</option>
            </select>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th>Cliente</th>
                        <th>Tipo</th>
                        <th>Itens</th>
                        <th>Total</th>
                        <th>Pagamento</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                        [1,'João Silva','Delivery','Burger Clássico x2','R$ 57,80','PIX','pendente','09/06 14:32'],
                        [2,'Maria Souza','Retirada','Pizza Margherita x1','R$ 42,90','Cartão','em_preparo','09/06 14:15'],
                        [3,'Pedro Lima','Local','Combo Tacos x2, Refri x2','R$ 83,60','Dinheiro','entregue','09/06 13:50'],
                        [4,'Ana Costa','Delivery','Burger Bacon x1','R$ 34,90','Cartão','pendente','09/06 13:30'],
                        [5,'Carlos M.','Delivery','Batata Frita x2, Refri x2','R$ 55,60','PIX','saiu_entrega','09/06 13:10'],
                    ] as $p)
                    <tr>
                        <td class="ps-3 text-muted small">#{{ $p[0] }}</td>
                        <td class="fw-semibold">{{ $p[1] }}</td>
                        <td><span class="badge bg-light text-dark">{{ $p[2] }}</span></td>
                        <td class="text-muted small">{{ $p[3] }}</td>
                        <td class="fw-bold">{{ $p[4] }}</td>
                        <td class="text-muted small">{{ $p[5] }}</td>
                        <td>
                            <span class="badge badge-{{ $p[6] }} px-2 py-1 rounded-pill">
                                {{ ucfirst(str_replace('_',' ',$p[6])) }}
                            </span>
                        </td>
                        <td class="text-muted small">{{ $p[7] }}</td>
                        <td>
                            <select class="form-select form-select-sm" style="width:130px;border-radius:50px;font-size:.75rem">
                                <option>Pendente</option>
                                <option>Em preparo</option>
                                <option>Saiu entrega</option>
                                <option>Entregue</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
