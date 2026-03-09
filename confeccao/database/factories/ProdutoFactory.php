<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'codigo' => $this->faker->unique()->ean8(),
            'descricao' => $this->faker->sentence(),
            'preco' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
