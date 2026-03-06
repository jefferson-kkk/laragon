<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Clientes;
use App\Models\User;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_clientes_index()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('clientes.index'));
        $response->assertStatus(200);
    }

    public function test_can_create_cliente_via_form()
    {
        $data = [
            'nome' => 'Teste Cliente',
            'cpf' => '11122233344',
            'telefone' => '11988887777',
        ];

        $this->actingAs(User::factory()->create());
        $response = $this->post(route('clientes.store'), $data);
        $response->assertRedirect(route('clientes.index'));

        $this->assertDatabaseHas('clientes', [
            'cpf' => '11122233344',
        ]);
    }
}
