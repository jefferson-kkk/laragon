<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Produto;
use App\Models\User;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_produtos_index()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('produtos.index'));
        $response->assertStatus(200);
    }

    public function test_can_create_produto_via_form()
    {
        $data = [
            'nome' => 'Produto Teste',
            'codigo' => 'ABC123',
            'preco' => 9.99,
            'descricao' => 'Descrição do produto',
        ];

        $this->actingAs(User::factory()->create());
        $response = $this->post(route('produtos.store'), $data);
        $response->assertRedirect(route('produtos.index'));

        $this->assertDatabaseHas('produtos', [
            'codigo' => 'ABC123',
        ]);
    }
}
