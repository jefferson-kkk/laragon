<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Cadastrar Item de Estoque
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('estoque.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nome_produto" class="block text-sm font-medium text-gray-700">Nome do produto</label>
                        <input id="nome_produto" name="nome_produto" type="text" value="{{ old('nome_produto') }}" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('nome_produto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="codigo_produto" class="block text-sm font-medium text-gray-700">Código do produto</label>
                        <input id="codigo_produto" name="codigo_produto" type="text" value="{{ old('codigo_produto') }}" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('codigo_produto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <!-- add other fields as needed -->

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>