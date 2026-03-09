<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Cadastrar Clientes
        </h2>
    

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <form method="POST" action="{{ route('clientes.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Nome
                        </label>

                        <input
                            type="text"
                            name="nome"
                            value="{{ old('nome') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            required
                        >
                    </div>


                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            CPF
                        </label>

                        <input
                            type="text"
                            name="cpf"
                            value="{{ old('cpf') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            required
                        >
                    </div>


                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Telefone
                        </label>

                        <input
                            type="text"
                            name="telefone"
                            value="{{ old('telefone') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        >
                    </div>


                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="reserva" value="1" class="rounded">
                            <span class="ml-2">Reserva</span>
                        </label>
                    </div>


                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                        >
                            Salvar Cliente
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
    </x-slot>
</x-app-layout>