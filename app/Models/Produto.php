<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'categoria_id', 'nome', 'descricao', 'preco_base', 'imagem_url', 'disponivel'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class);
    }
}
