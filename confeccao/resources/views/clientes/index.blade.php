<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Confecção — Clientes
        </h2>
  

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Cabeçalho -->
            <div class="flex items-center justify-between mb-8">

                <div>
                    <h3 class="text-2xl font-bold text-gray-700">
                        Lista de Clientes
                    </h3>

                    <p class="text-gray-500">
                        Clientes cadastrados no sistema
                    </p>
                </div>

                <!-- BOTÃO CORRETO -->
                <a href="{{ route('clientes.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    Novo Cliente
                </a>

            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif


            <!-- GRID CLIENTES -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($clientes as $cliente)

                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        {{ $cliente->nome }}
                    </h3>

                    <div class="space-y-2 text-gray-600">

                        <p>
                            <span class="font-medium text-gray-700">CPF:</span>
                            {{ $cliente->cpf }}
                        </p>

                        <p>
                            <span class="font-medium text-gray-700">Telefone:</span>
                            {{ $cliente->telefone }}
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

        </div>
    </div>
      </x-slot>
</x-app-layout>