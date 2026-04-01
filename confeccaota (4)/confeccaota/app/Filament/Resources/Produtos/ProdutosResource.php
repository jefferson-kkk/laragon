<?php

namespace App\Filament\Resources\Produtos;

use App\Filament\Resources\Produtos\Pages\CreateProdutos;
use App\Filament\Resources\Produtos\Pages\EditProdutos;
use App\Filament\Resources\Produtos\Pages\ListProdutos;
use App\Filament\Resources\Produtos\Pages\ViewProdutos;
use App\Models\Produtos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class ProdutosResource extends Resource
{
    protected static ?string $model = Produtos::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Meus Produtos';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nome')
                ->required()
                ->label('Nome do Produto')
                ->maxLength(255),

            // CAMPO DE QUANTIDADE ADICIONADO AQUI
            TextInput::make('quantidade')
                ->numeric()
                ->required()
                ->default(0)
                ->label('Quantidade (Estoque Inicial)'),

            TextInput::make('preco')
                ->numeric()
                ->prefix('R$')
                ->required()
                ->label('Preço Unitário'),

            Select::make('categoria')
                ->options([
                    'comida' => 'Comida',
                    'limpeza' => 'Limpeza',
                    'eletronicos' => 'Eletrônicos',
                    'outros' => 'Outros',
                ])
                ->required()
                ->label('Categoria do Produto'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Produto')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                // COLUNA DE QUANTIDADE ADICIONADA NA TABELA
                TextColumn::make('quantidade')
                    ->label('Qtd em Estoque')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('preco')
                    ->label('Preço Base')
                    ->money('BRL')
                    ->sortable(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // 
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProdutos::route('/'),
            'create' => CreateProdutos::route('/create'),
            'view' => ViewProdutos::route('/{record}'),
            'edit' => EditProdutos::route('/{record}/edit'),
        ];
    }
}
