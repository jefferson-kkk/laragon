<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fornecedor;
use App\Models\User;

class FornecedorTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_fornecedores_index()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('fornecedores.index'));
        $response->assertStatus(200);
    }

    public function test_can_create_fornecedor_via_form()
    {
        $data = [
            'nome' => 'Fornecedor Teste',
            'telefone' => '11999998888',
            'email' => 'teste@fornecedor.com',
        ];

        $this->actingAs(User::factory()->create());
        $response = $this->post(route('fornecedores.store'), $data);
        $response->assertRedirect(route('fornecedores.index'));

        $this->assertDatabaseHas('fornecedores', [
            'email' => 'teste@fornecedor.com',
        ]);
    }
}
