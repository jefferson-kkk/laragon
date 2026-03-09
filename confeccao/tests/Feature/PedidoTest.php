<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Pedido;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_pedidos_index()
    {
        $response = $this->get(route('pedidos.index'));
        $response->assertStatus(200);
    }

    public function test_can_create_pedido_via_form()
    {
        $data = [
            'nome_cliente' => 'Cliente Teste',
            'cpf_cliente' => '12345678900',
            'telefone_cliente' => '11912345678',
            'codigo_referencia' => 'REF123',
            'data_pedido' => '2026-03-06',
            'quantidade_itens' => 5,
        ];

        $response = $this->post(route('pedidos.store'), $data);
        $response->assertRedirect(route('pedidos.index'));

        $this->assertDatabaseHas('pedidos', [
            'codigo_referencia' => 'REF123',
        ]);
    }
}
