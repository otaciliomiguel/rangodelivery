@extends('layouts.admin')
@section('title','Reservas')
@section('page-title','Reservas')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center pt-3">
        <h6 class="fw-bold mb-0">Todas as reservas</h6>
        <input type="date" class="form-control form-control-sm" style="width:auto;border-radius:50px">
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th>Cliente</th>
                        <th>Mesa</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Pessoas</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                        [1,'Carlos M.','Mesa 3','09/06/2026','19:00',2,'agendada'],
                        [2,'Fernanda R.','Mesa 7','09/06/2026','20:30',4,'agendada'],
                        [3,'Lucas T.','Mesa 1','09/06/2026','21:00',6,'agendada'],
                        [4,'Beatriz S.','Mesa 5','10/06/2026','19:30',3,'agendada'],
                        [5,'Rafael O.','Mesa 2','08/06/2026','20:00',2,'concluida'],
                    ] as $r)
                    <tr>
                        <td class="ps-3 text-muted small">#{{ $r[0] }}</td>
                        <td class="fw-semibold">{{ $r[1] }}</td>
                        <td><span class="badge bg-light text-dark">{{ $r[2] }}</span></td>
                        <td class="text-muted small">{{ $r[3] }}</td>
                        <td class="fw-semibold">{{ $r[4] }}</td>
                        <td>{{ $r[5] }} pessoas</td>
                        <td>
                            @if($r[6] == 'agendada')
                                <span class="badge" style="background:#CCE5FF;color:#004085">Agendada</span>
                            @elseif($r[6] == 'concluida')
                                <span class="badge" style="background:#D4EDDA;color:#155724">Concluída</span>
                            @else
                                <span class="badge" style="background:#F8D7DA;color:#721C24">Cancelada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-success" style="border-radius:50px;font-size:.75rem">Confirmar</button>
                                <button class="btn btn-sm btn-outline-danger" style="border-radius:50px;font-size:.75rem">Cancelar</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
