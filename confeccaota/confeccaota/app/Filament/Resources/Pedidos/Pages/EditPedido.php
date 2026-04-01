<?php

namespace App\Filament\Resources\Pedidos\Pages; // <-- Namespace corrigido

use App\Filament\Resources\Pedidos\PedidoResource; // <-- Importação corrigida
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPedido extends EditRecord
{
    protected static string $resource = PedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Esta função roda toda vez que você edita e salva o pedido
    protected function afterSave(): void
    {
        $pedido = $this->record;
        
        // Garante que o Laravel carregue as edições dos itens recém-salvos no banco
        $pedido->load('itens');
        
        $total = $pedido->itens->sum(function ($item) {
            return $item->quantidade * $item->preco_unitario;
        });

        $pedido->update(['valor_total' => $total]);
    }
}