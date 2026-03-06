<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Estoque;
use App\Models\User;

class EstoqueTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_estoque_index()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('estoque.index'));
        $response->assertStatus(200);
    }

    public function test_can_create_estoque_item_via_form()
    {
        $this->actingAs(User::factory()->create());

        $data = [
            'nome_produto' => 'Item Teste',
            'codigo_produto' => 'XYZ123',
            'descricao' => 'Descrição',
            'quantidade' => 5,
            'preco_unitario' => 10.50,
        ];

        $response = $this->post(route('estoque.store'), $data);
        $response->assertRedirect(route('estoque.index'));

        $this->assertDatabaseHas('estoques', [
            'codigo_produto' => 'XYZ123',
        ]);
    }
}
