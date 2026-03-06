<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = ['nome_produto','codigo_produto','descricao',
    'quantidade','preco_unitario',  'fornecedor',  'categoria','data_entrada','ativo',
];
}