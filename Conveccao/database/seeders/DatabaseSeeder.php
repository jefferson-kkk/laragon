<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pedido;
use App\Models\Estoque;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gerar alguns registros para testar
        Clientes::factory(5)->create();
        Pedido::factory(10)->create();
        Estoque::factory(10)->create();
        Fornecedor::factory(10)->create();
        Produto::factory(10)->create();

    }
}