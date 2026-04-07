<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\CarrinhoController;




// 1. Rota Inicial (Raiz)
// Faz o localhost:8000 abrir direto na sua lista de produtos
Route::get('/', [ProdutoController::class, 'index']);

// 2. Rota de Boas-Vindas (Opcional)
Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('lojas', LojaController::class);
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::get('/carrinho/add/{id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.add');
Route::patch('/carrinho/update', [CarrinhoController::class, 'atualizar'])->name('carrinho.update');
Route::delete('/carrinho/remove', [CarrinhoController::class, 'remover'])->name('carrinho.remove');