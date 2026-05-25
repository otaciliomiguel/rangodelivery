<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    public $timestamps = false;

    protected $table = 'itens_pedido';

    protected $fillable = [
        'pedido_id', 'produto_id', 'quantidade', 'preco_unitario', 'observacao'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
