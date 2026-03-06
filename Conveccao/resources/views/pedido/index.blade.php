<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Confecção — Pedidos
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Título da seção + formulário de criação -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-700">
                            Últimos Pedidos
                        </h3>
                        <p class="text-gray-500">
                            Mostrando até 10 pedidos gerados pelos seeders
                        </p>
                    </div>
                    <button id="show-form" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Novo Pedido
                    </button>
                </div>

                <!-- formulário em collapsible -->
                <div id="form-container" class="mt-6 hidden bg-white p-6 rounded-lg shadow">
                    <form method="POST" action="{{ route('pedidos.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nome_cliente" class="block text-sm font-medium text-gray-700">Nome do cliente</label>
                            <input id="nome_cliente" name="nome_cliente" type="text" value="{{ old('nome_cliente') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('nome_cliente')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="cpf_cliente" class="block text-sm font-medium text-gray-700">CPF do cliente</label>
                            <input id="cpf_cliente" name="cpf_cliente" type="text" value="{{ old('cpf_cliente') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('cpf_cliente')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefone_cliente" class="block text-sm font-medium text-gray-700">Telefone do cliente</label>
                            <input id="telefone_cliente" name="telefone_cliente" type="text" value="{{ old('telefone_cliente') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('telefone_cliente')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="codigo_referencia" class="block text-sm font-medium text-gray-700">Código de referência</label>
                            <input id="codigo_referencia" name="codigo_referencia" type="text" value="{{ old('codigo_referencia') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('codigo_referencia')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="data_pedido" class="block text-sm font-medium text-gray-700">Data do pedido</label>
                            <input id="data_pedido" name="data_pedido" type="date" value="{{ old('data_pedido') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('data_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="quantidade_itens" class="block text-sm font-medium text-gray-700">Quantidade de itens</label>
                            <input id="quantidade_itens" name="quantidade_itens" type="number" value="{{ old('quantidade_itens') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" min="1" required>
                            @error('quantidade_itens')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const btn = document.getElementById('show-form');
                    const formCont = document.getElementById('form-container');
                    btn.addEventListener('click', function () {
                        formCont.classList.toggle('hidden');
                    });
                });
            </script>

            <!-- Grid de Pedidos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($pedidos as $pedido)
                    <div class="bg-white rounded-lg shadow-sm p-5 hover:shadow-md transition duration-200 border border-gray-200">

                        <!-- Cliente -->
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">
                            {{ $pedido->nome_cliente }}
                        </h3>

                        <!-- Informações -->
                        <ul class="text-gray-600 text-sm space-y-1">
                            <li><strong class="text-gray-700">CPF:</strong> {{ $pedido->cpf_cliente }}</li>
                            <li><strong class="text-gray-700">Telefone:</strong> {{ $pedido->telefone_cliente }}</li>
                            <li><strong class="text-gray-700">Ref.:</strong> {{ $pedido->codigo_referencia }}</li>
                            <li><strong class="text-gray-700">Data:</strong> {{ $pedido->data_pedido }}</li>
                            <li><strong class="text-gray-700">Itens:</strong> {{ $pedido->quantidade_itens }}</li>
                        </ul>

                    </div>
                @endforeach

            </div>
            <!-- pagination links -->
            <div class="mt-6">
                {{ $pedidos->links() }}
            </div>

        </div>
    </div>
</x-app-layout>