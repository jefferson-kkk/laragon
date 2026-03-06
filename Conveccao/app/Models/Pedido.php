<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory; // ← ESSENCIAL

    protected $fillable = ['nome_cliente','cpf_cliente','telefone_cliente','codigo_referencia', 
    'data_pedido','quantidade_itens'];
}