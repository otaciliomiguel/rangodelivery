<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    public $timestamps = false;

    protected $fillable = ['numero', 'capacidade', 'status'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
