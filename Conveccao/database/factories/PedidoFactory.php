<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nome_cliente' => fake()->name(),
        'cpf_cliente' => fake()->numerify('###########'), // 11 dígitos para CPF
        'telefone_cliente' => fake()->phoneNumber(),
        'codigo_referencia' => fake()->bothify('??###??###'), // código tipo "AB123CD456"
        'data_pedido' => fake()->date(),
        'quantidade_itens' => fake()->numberBetween(1, 20), // número entre 1 e 20
        ];
    }
}
