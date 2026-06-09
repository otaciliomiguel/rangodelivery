@extends('layouts.admin')
@section('title','Mesas')
@section('page-title','Mesas')

@section('content')
<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-primary" style="border-radius:50px"><i class="bi bi-plus me-1"></i> Nova mesa</button>
</div>

<div class="row gy-3">
    @foreach([
        [1,4,'disponivel'],[2,2,'ocupada'],[3,6,'reservada'],
        [4,4,'disponivel'],[5,8,'disponivel'],[6,2,'ocupada'],
        [7,4,'reservada'],[8,6,'disponivel'],[9,2,'disponivel'],
        [10,10,'disponivel'],
    ] as $m)
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 text-center">
            <div style="font-size:2.5rem;margin-bottom:.5rem">🪑</div>
            <div class="fw-bold fs-5">Mesa {{ $m[0] }}</div>
            <div class="text-muted small mb-2">{{ $m[1] }} lugares</div>
            <span class="badge rounded-pill
                {{ $m[2] == 'disponivel' ? 'bg-success' : ($m[2] == 'ocupada' ? 'bg-danger' : 'bg-warning text-dark') }}">
                {{ ucfirst($m[2]) }}
            </span>
            <div class="d-flex gap-1 justify-content-center mt-2">
                <button class="btn btn-sm btn-outline-primary" style="border-radius:50px"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-outline-danger" style="border-radius:50px"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
