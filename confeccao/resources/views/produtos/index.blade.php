<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Confecção — Produtos
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Título da seção + formulário de criação -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-700">
                            Catálogo de Produtos
                        </h3>
                        <p class="text-gray-500">
                            Produtos cadastrados no sistema
                        </p>
                    </div>
                    <button id="show-form" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Novo Produto
                    </button>
                </div>

                <!-- formulario em collapsible -->
                <div id="form-container" class="mt-6 hidden bg-white p-6 rounded-lg shadow">
                    <form method="POST" action="{{ route('produtos.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input id="nome" name="nome" type="text" value="{{ old('nome') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('nome')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                            <input id="codigo" name="codigo" type="text" value="{{ old('codigo') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('codigo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                            <input id="preco" name="preco" type="number" step="0.01" value="{{ old('preco') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('preco')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                            <textarea id="descricao" name="descricao" rows="3" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descricao') }}</textarea>
                            @error('descricao')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
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

            <!-- Grid de Produtos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($produtos as $produto)
                    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">
                            {{ $produto->nome }}
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <p><span class="font-medium text-gray-700">Código:</span> {{ $produto->codigo }}</p>
                            <p><span class="font-medium text-gray-700">Preço:</span> R$ {{ number_format($produto->preco,2,',','.') }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>