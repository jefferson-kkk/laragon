<?php

namespace App\Filament\Resources\Produtos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn; // Importação necessária para as colunas

class ProdutosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // ADICIONE ESTAS LINHAS ABAIXO:
                TextColumn::make('nome')
                ->label('Nome do Produto')
                ->searchable(),
                TextColumn::make('quantidade')
                    ->label('Qtd. Geral'),
                TextColumn::make('estoque.quantidade_produto') // Busca a info da relação
                    ->label('No Estoque'),
                TextColumn::make('preco')
                    ->money('BRL'),

                TextColumn::make('nome')
                    ->label('Nome do Produto')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('quantidade')
                    ->label('Quantidade')
                    ->sortable(),

                TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge(),

                TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),
                TextColumn::make('estoque.quantidade_produto') // Isso busca da OUTRA tabela
                    ->label('Qtd no Estoque'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->label('visualizar'),
                EditAction::make()->label('editar'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}