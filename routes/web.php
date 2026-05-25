<?php

use Illuminate\Support\Facades\Route;

// ── SITE PÚBLICO ──
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cardapio', function () {
    return view('cardapio');
})->name('cardapio');

Route::get('/reservas', function () {
    return view('reservas');
})->name('reservas');

Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos');

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

// ── ADMIN ──
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/pedidos', function () {
        return view('admin.pedidos');
    })->name('pedidos');

    Route::get('/reservas', function () {
        return view('admin.reservas');
    })->name('reservas');

    Route::get('/produtos', function () {
        return view('admin.produtos');
    })->name('produtos');

    Route::get('/categorias', function () {
        return view('admin.categorias');
    })->name('categorias');

    Route::get('/usuarios', function () {
        return view('admin.usuarios');
    })->name('usuarios');

    Route::get('/mesas', function () {
        return view('admin.mesas');
    })->name('mesas');
});
