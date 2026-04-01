<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    public function cliente(){
        // Corrigido para "Cliente" com C maiúsculo
        return $this->belongsTo(Cliente::class);
    }

    public function itens(){
        // Corrigido de "hasmay" para "hasMany"
        return $this->hasMany(ItemPedido::class);
    }
}