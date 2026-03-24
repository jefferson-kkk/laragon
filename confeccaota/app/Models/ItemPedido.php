<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function produto(){
        // Corrigido: belongsTo (com 's') e Produto::class (no singular)
        return $this->belongsTo(Produtos::class);
    }
}