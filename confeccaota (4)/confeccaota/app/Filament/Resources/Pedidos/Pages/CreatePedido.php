<?php

namespace App\Filament\Resources\Pedidos\Pages;

use App\Filament\Resources\Pedidos\PedidoResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePedido extends CreateRecord
{
    protected static string $resource = PedidoResource::class;

    protected function afterCreate(): void
    {
        $pedido = $this->record;
        
        // Garante que o Laravel carregue os itens recém criados
        $pedido->load('itens');
        
        $total = $pedido->itens->sum(function ($item) {
            return $item->quantidade * $item->preco_unitario;
        });

        $pedido->update(['valor_total' => $total]);
    }

    // NOVA FUNÇÃO: Força o sistema a voltar para a Tabela de Pedidos após salvar!
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}