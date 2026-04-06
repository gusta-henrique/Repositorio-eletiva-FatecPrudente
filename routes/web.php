<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;

// 1. Rota Inicial (Raiz)
// Faz o localhost:8000 abrir direto na sua lista de produtos
Route::get('/', [ProdutoController::class, 'index']);

// 2. Rota de Boas-Vindas (Opcional)
Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);