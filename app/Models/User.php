<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'telefone'
    ];

    protected $hidden = ['password'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
