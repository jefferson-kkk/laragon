<?php

use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// CLIENTES

Route::get('/teste', function () {
    return 'rota funcionando';

});

Route::middleware('auth')->group(function () {

    Route::resource('estoque', EstoqueController::class);
    
    Route::resource('clientes', ClienteController::class);
  

    Route::resource('fornecedores', FornecedorController::class);
        

    Route::resource('produtos', ProdutoController::class)
        ->only(['index', 'create', 'store']);

    Route::resource('pedidos', PedidoController::class)
        ->only(['index', 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::fallback(function () {
//     return redirect('/');
// });

require __DIR__.'/auth.php';