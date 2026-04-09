<?php

use App\Http\Controllers\LojaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

// --- ÁREA DO CLIENTE ---
// Página Inicial e Catálogo
Route::get('/', [ProdutoController::class, 'catalogo'])->name('home');
Route::get('/catalogo', [ProdutoController::class, 'catalogo'])->name('catalogo');

// Carrinho de Compras
Route::get('/carrinho', [ProdutoController::class, 'exibirCarrinho'])->name('carrinho.exibir');
Route::post('/carrinho/adicionar/{id}', [ProdutoController::class, 'adicionarCarrinho'])->name('carrinho.adicionar');
Route::post('/carrinho/atualizar/{id}', [ProdutoController::class, 'atualizarCarrinho'])->name('carrinho.update');
Route::post('/carrinho/limpar', [ProdutoController::class, 'limparCarrinho'])->name('carrinho.limpar');


// --- ÁREA ADMINISTRATIVA ---
// Gerenciar Produtos (É aqui que você cadastra os itens da Fatec!)
Route::resource('produtos', ProdutoController::class);

// Gerenciar Dados da Loja (Opcional, se você tiver uma tabela de lojas)
Route::resource('lojas', LojaController::class);