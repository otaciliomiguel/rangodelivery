@extends('layouts.admin')
@section('title','Categorias')
@section('page-title','Categorias')

@section('content')
<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-primary" style="border-radius:50px"><i class="bi bi-plus me-1"></i> Nova categoria</button>
</div>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-3">#</th>
                    <th>Ícone</th>
                    <th>Nome</th>
                    <th>Produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach([
                    [1,'🍔','Burgers',3],
                    [2,'🍕','Pizzas',2],
                    [3,'🌮','Tacos',1],
                    [4,'🍟','Porções',2],
                    [5,'🥤','Bebidas',2],
                    [6,'🍰','Sobremesas',2],
                ] as $c)
                <tr>
                    <td class="ps-3 text-muted small">{{ $c[0] }}</td>
                    <td style="font-size:1.5rem">{{ $c[1] }}</td>
                    <td class="fw-semibold">{{ $c[2] }}</td>
                    <td><span class="badge bg-light text-dark">{{ $c[3] }} produtos</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-outline-primary" style="border-radius:50px"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger" style="border-radius:50px"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
