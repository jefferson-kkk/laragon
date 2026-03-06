@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Estoque de Produtos</h1>
    

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Fornecedor</th>
                <th>Categoria</th>
                <th>Data Entrada</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estoques as $estoque)
                <tr>
                    <td>{{ $estoque->id }}</td>
                    <td>{{ $estoque->nome_produto }}</td>
                    <td>{{ $estoque->codigo_produto }}</td>
                    <td>{{ $estoque->descricao }}</td>
                    <td>{{ $estoque->quantidade }}</td>
                    <td>R$ {{ number_format($estoque->preco_unitario, 2, ',', '.') }}</td>
                    <td>{{ $estoque->fornecedor }}</td>
                    <td>{{ $estoque->categoria }}</td>
                    <td>{{ $estoque->data_entrada }}</td>
                    <td>{{ $estoque->ativo ? 'Sim' : 'Não' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection