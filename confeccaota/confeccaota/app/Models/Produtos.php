<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $guarded = [];

    // Um produto pode ter VÁRIAS movimentações de estoque
    public function estoques()
    {
        return $this->hasMany(Estoque::class, 'produto_id');
    }
}