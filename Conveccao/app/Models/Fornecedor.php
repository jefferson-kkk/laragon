<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    // Laravel would guess "fornecedors" which is wrong for Portuguese;
    // our migration creates "fornecedores" so set it explicitly.
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'telefone', 'email'];
}
