<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function index()
    {
        // retrieve all stock items and pass them with a matching variable name
        $estoques = Estoque::all();
        return view('estoque.index', compact('estoques')); 
    }

    public function create()
    {
        // show create form (view created to match the other resources)
        return view('estoque.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'codigo_produto' => 'required|string|max:50|unique:estoques,codigo_produto',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0',
            'fornecedor' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:100',
            'data_entrada' => 'nullable|date',
            'ativo' => 'nullable|boolean',
        ]);

        if (!isset($data['ativo'])) $data['ativo'] = true;

        Estoque::create($data);

        return redirect()->route('estoque.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }
}
