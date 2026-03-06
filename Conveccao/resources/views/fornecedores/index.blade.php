<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Confecção — Fornecedores
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Título da seção + formulário de criação -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-700">
                            Lista de Fornecedores
                        </h3>
                        <p class="text-gray-500">
                            Fornecedores cadastrados no sistema
                        </p>
                    </div>
                    <button id="show-form" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Novo Fornecedor
                    </button>
                </div>

                <!-- formulario em collapsible -->
                <div id="form-container" class="mt-6 hidden bg-white p-6 rounded-lg shadow">
                    <form method="POST" action="{{ route('fornecedores.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input id="nome" name="nome" type="text" value="{{ old('nome') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('nome')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                            <input id="telefone" name="telefone" type="text" value="{{ old('telefone') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('telefone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
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

            <!-- Grid de Fornecedores -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($fornecedores as $fornecedor)
                    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">
                            {{ $fornecedor->nome }}
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <p><span class="font-medium text-gray-700">Telefone:</span> {{ $fornecedor->telefone }}</p>
                            <p><span class="font-medium text-gray-700">Email:</span> {{ $fornecedor->email }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>