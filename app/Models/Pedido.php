<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'user_id', 'status', 'tipo_pedido', 'valor_total', 'metodo_pagamento', 'endereco_entrega'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemPedido::class);
    }
}
