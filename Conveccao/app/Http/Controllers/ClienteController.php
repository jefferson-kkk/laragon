<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Clientes;

class ClienteController extends Controller
{
    // LISTA todos os clientes
    public function index(): View
    {
        $clientes = Clientes::all();
        return view('clientes.index', compact('clientes')); // lista todos os clientes
    }

    // MOSTRA formulário de criação
    public function create(): View
    {
        return view('clientes.create'); // formulário de cadastro
    }

    // ARMAZENA novo cliente
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'telefone' => 'nullable|string|max:20',
            'reserva' => 'nullable|boolean',
        ]);

        $data['reserva'] = $data['reserva'] ?? 0;

        Clientes::create($data);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente cadastrado com sucesso!');
    }
}