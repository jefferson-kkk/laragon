<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        // fetch the latest 10 pedidos for display (pagination)
        $pedidos = Pedido::latest()->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Store a newly created pedido in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'cpf_cliente' => 'required|string|max:14',
            'telefone_cliente' => 'nullable|string|max:20',
            'codigo_referencia' => 'required|string|max:255',
            'data_pedido' => 'required|date',
            'quantidade_itens' => 'required|integer|min:1',
        ]);

        Pedido::create($data);

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido cadastrado com sucesso!');
    }
}
