<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['pendente', 'em_preparo', 'saiu_entrega', 'entregue'])->default('pendente');
            $table->enum('tipo_pedido', ['delivery', 'retirada', 'local']);
            $table->decimal('valor_total', 10, 2)->nullable();
            $table->string('metodo_pagamento')->nullable();
            $table->text('endereco_entrega')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
