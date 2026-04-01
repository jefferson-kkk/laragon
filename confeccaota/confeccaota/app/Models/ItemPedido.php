<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $guarded = [];
    
    // Esta é a linha mágica que resolve o erro ao guardar pelo Repeater:
    public $timestamps = false; 

    public function produto(){
        return $this->belongsTo(Produtos::class);
    }
}