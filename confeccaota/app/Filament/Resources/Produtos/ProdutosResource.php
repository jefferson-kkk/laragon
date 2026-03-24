<?php

namespace App\Filament\Resources\Produtos;

use App\Filament\Resources\Produtos\Pages\CreateProdutos;
use App\Filament\Resources\Produtos\Pages\EditProdutos;
use App\Filament\Resources\Produtos\Pages\ListProdutos;
use App\Filament\Resources\Produtos\Pages\ViewProdutos;
use App\Filament\Resources\Produtos\Schemas\ProdutosForm;
use App\Filament\Resources\Produtos\Schemas\ProdutosInfolist;
use App\Filament\Resources\Produtos\Tables\ProdutosTable;
use App\Models\Produtos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class ProdutosResource extends Resource
{
    protected static ?string $model = Produtos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'produtos';

    public static function form(Schema $schema): Schema
    {
         ProdutosForm::configure($schema);
        return $schema
        ->schema([
        TextInput::make('nome')->required()->label('Nome do fornecedor'),
        TextInput::make('quantidade')->email()->label('E-mail'),
        TextInput::make('categoria')->tel()->label('Telefone/Zap'),
        TextInput::make('preco')->tel()->label('CPF ou CPNJ'),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProdutosInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
       ProdutosTable::configure($table);
            return $table->columns([
            TextColumn::make('nome')->searchable(),
            TextColumn::make('quantidade')->searchable(),
            TextColumn::make('categoria'),
            TextColumn::make('preco'),
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
