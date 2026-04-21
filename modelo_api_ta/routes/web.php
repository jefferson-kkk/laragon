<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

// --- API POKEMON (Funcional) ---
Route::get('/pokemon/{nome}', function ($nome) {
    $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$nome}");

    if ($response->successful()) {
        $dados = $response->json();
        return response()->json([
            'status' => 'Conectado com sucesso!',
            'resultado' => [
                'identificador' => $dados['id'],
                'nome_do_pokemon' => ucfirst($dados['name']),
                'foto' => $dados['sprites']['front_default'],
            ],
        ], 200);
    }

    return response()->json(['status' => 'Erro ao conectar ao serviço Pokemon'], 500);
});


Route::get('/dummyjson/{id}', function ($id) { 
    $response2 = Http::get("https://dummyjson.com/users/{$id}");

    if ($response2->successful()) { 
        $dadoss = $response2->json();

        return response()->json([
            'status' => 'Conectado com sucesso!',
            'resultado' => [
                'identificador' => $dadoss['id'],
                'nome_usuario' => ($dadoss['firstName'] ?? 'Usuário') . ' ' . ($dadoss['lastName'] ?? '')
            ],
        ], 200);
    }

    return response()->json(['status' => 'Usuário não encontrado'], 404);
});

// 
Route::post('/user/novo', function (Request $request) {
    $validados = $request->validate([
        'firstName' => 'required|string|min:3',
        'gender' => 'required|string',
        'bloodGroup' => 'required|string'
    ]);

    return response()->json([
        'mensagem' => 'Usuario cadastrado com sucesso',
        'id_gerado' => rand(1000, 9000),
        'dados_recebidos' => $validados
    ], 201);
}); 


// pokemon
Route::post('/pokemon/novo', function (Request $request) {
    $dados = $request->validate([
        'nome' => 'required|string|min:3',
        'tipo' => 'required|string',
        'ataque' => 'required|integer'
    ]);

    return response()->json([
        'mensagem' => 'Pokemon cadastrado com sucesso!',
        'id_gerado' => rand(1000, 9000),
        'dados_recebidos' => $dados
    ], 201);
});