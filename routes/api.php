<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;

// Users
Route::apiResource('users', UserController::class);

// Categorias
Route::apiResource('categorias', CategoriaController::class);

// Produtos
Route::apiResource('produtos', ProdutoController::class);

// Pedidos
Route::apiResource('pedidos', PedidoController::class)->except(['update', 'destroy']);
Route::patch('pedidos/{id}/status', [PedidoController::class, 'atualizarStatus']);

// Reservas
Route::apiResource('reservas', ReservaController::class)->except(['update']);
Route::patch('reservas/{id}/status', [ReservaController::class, 'atualizarStatus']);
