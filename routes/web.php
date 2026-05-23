<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| ÁREA PÚBLICA
|--------------------------------------------------------------------------
*/

// Página inicial
Route::get('/', function () {

    return redirect('/catalogo');

});

// Catálogo
Route::get('/catalogo', [ProdutoController::class, 'catalogo'])
    ->name('catalogo');


/*
|--------------------------------------------------------------------------
| CARRINHO
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/carrinho', [ProdutoController::class, 'exibirCarrinho'])
        ->name('carrinho.exibir');

    Route::post('/carrinho/adicionar/{id}', [ProdutoController::class, 'adicionarCarrinho'])
        ->name('carrinho.adicionar');

    Route::post('/carrinho/atualizar/{id}', [ProdutoController::class, 'atualizarCarrinho'])
        ->name('carrinho.update');

    Route::post('/carrinho/limpar', [ProdutoController::class, 'limparCarrinho'])
        ->name('carrinho.limpar');

});


/*
|--------------------------------------------------------------------------
| linktree
|--------------------------------------------------------------------------
*/

Route::get('/finalizar-compra', [LojaController::class, 'linktree'])
    ->name('finalizar.compra');



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ÁREA ADMINISTRATIVA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // CRUD Usuários
    Route::resource('usuarios', UsuarioController::class);

    // CRUD Produtos
    Route::resource('produtos', ProdutoController::class);

    // CRUD Lojas
    Route::resource('lojas', LojaController::class);

});


/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';