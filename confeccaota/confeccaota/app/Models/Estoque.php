<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $guarded = [];

    // Esta movimentação pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'produto_id');
    }
}