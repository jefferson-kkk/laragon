<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estoque;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome_produto' => fake()->word(),
            'codigo_produto' => fake()->randomnumber(9,true),
            'descricao' => fake()->sentence(),
            'quantidade' => fake()->numberBetween(1, 100),
            'preco_unitario' => fake()->randomFloat(2, 10, 500),
            'fornecedor' => fake()->company(),
            'categoria' => fake()->word(),
            'data_entrada' => fake()->date(),
            'ativo' => fake()->boolean(80),
        ];
    }
}