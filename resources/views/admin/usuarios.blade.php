@extends('layouts.admin')
@section('title','Usuários')
@section('page-title','Usuários')

@section('content')
<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-primary" style="border-radius:50px"><i class="bi bi-plus me-1"></i> Novo usuário</button>
</div>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-3">#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Perfil</th>
                    <th>Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach([
                    [1,'João Silva','joao@email.com','(11) 98765-4321','cliente','01/01/2026'],
                    [2,'Maria Souza','maria@email.com','(11) 91234-5678','cliente','15/02/2026'],
                    [3,'Admin','admin@rangodelivery.com','(11) 99999-9999','admin','01/01/2026'],
                    [4,'Pedro Lima','pedro@email.com','(11) 97777-8888','entregador','10/03/2026'],
                    [5,'Ana Costa','ana@email.com','(11) 96666-7777','cliente','20/04/2026'],
                ] as $u)
                <tr>
                    <td class="ps-3 text-muted small">{{ $u[0] }}</td>
                    <td class="fw-semibold">{{ $u[1] }}</td>
                    <td class="text-muted small">{{ $u[2] }}</td>
                    <td class="text-muted small">{{ $u[3] }}</td>
                    <td>
                        <span class="badge rounded-pill px-2
                            {{ $u[4] == 'admin' ? 'bg-danger' : ($u[4] == 'entregador' ? 'bg-warning text-dark' : 'bg-primary') }}">
                            {{ ucfirst($u[4]) }}
                        </span>
                    </td>
                    <td class="text-muted small">{{ $u[5] }}</td>
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
