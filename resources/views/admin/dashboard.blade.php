@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- STATS --}}
<div class="row gy-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#FFF0ED">
                <i class="bi bi-bag text-danger"></i>
            </div>
            <div>
                <div class="value">48</div>
                <div class="label">Pedidos hoje</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#EDF5FF">
                <i class="bi bi-calendar-check" style="color:#2563eb"></i>
            </div>
            <div>
                <div class="value">12</div>
                <div class="label">Reservas ativas</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#EDFBF1">
                <i class="bi bi-currency-dollar" style="color:#16a34a"></i>
            </div>
            <div>
                <div class="value">R$1.842</div>
                <div class="label">Faturamento hoje</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#FFF8ED">
                <i class="bi bi-people" style="color:#d97706"></i>
            </div>
            <div>
                <div class="value">320</div>
                <div class="label">Clientes cadastrados</div>
            </div>
        </div>
    </div>
</div>

{{-- PEDIDOS RECENTES --}}
<div class="row gy-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center pt-3">
                <h6 class="fw-bold mb-0">Pedidos recentes</h6>
                <a href="{{ url('/admin/pedidos') }}" class="btn btn-sm btn-outline-danger" style="border-radius:50px">Ver todos</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">#</th>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                [1,'João Silva','Delivery','R$ 52,80','pendente'],
                                [2,'Maria Souza','Retirada','R$ 34,90','em_preparo'],
                                [3,'Pedro Lima','Local','R$ 78,50','entregue'],
                                [4,'Ana Costa','Delivery','R$ 28,90','pendente'],
                            ] as $p)
                            <tr>
                                <td class="ps-3 text-muted small">#{{ $p[0] }}</td>
                                <td class="fw-semibold">{{ $p[1] }}</td>
                                <td><span class="badge bg-light text-dark">{{ $p[2] }}</span></td>
                                <td class="fw-bold">{{ $p[3] }}</td>
                                <td><span class="badge badge-{{ $p[4] }} px-2 py-1 rounded-pill">{{ ucfirst(str_replace('_',' ',$p[4])) }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- RESERVAS DO DIA --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 pt-3">
                <h6 class="fw-bold mb-0">Reservas de hoje</h6>
            </div>
            <div class="card-body">
                @foreach([
                    ['Mesa 3','Carlos M.','19:00','2 pessoas'],
                    ['Mesa 7','Fernanda R.','20:30','4 pessoas'],
                    ['Mesa 1','Lucas T.','21:00','6 pessoas'],
                ] as $r)
                <div class="d-flex align-items-start gap-3 mb-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center fw-bold text-white flex-shrink-0"
                         style="width:42px;height:42px;background:var(--primary);font-size:.8rem">
                        {{ explode(' ',$r[0])[1] }}
                    </div>
                    <div>
                        <div class="fw-bold small">{{ $r[1] }}</div>
                        <div class="text-muted" style="font-size:.78rem">{{ $r[0] }} · {{ $r[2] }} · {{ $r[3] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
