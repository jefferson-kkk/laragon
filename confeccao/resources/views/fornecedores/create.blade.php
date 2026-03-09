<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Cadastrar Fornecedor
        </h2>
    

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

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
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>