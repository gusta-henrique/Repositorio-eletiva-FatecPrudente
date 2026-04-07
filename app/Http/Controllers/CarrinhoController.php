<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    // Listar itens da Sessão
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    // ADICIONAR ITEM
    public function adicionar($id)
    {
        $produto = Produto::findOrFail($id);
        $carrinho = session()->get('carrinho', []);

        // Se o produto já está no carrinho, aumenta a quantidade
        if(isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            // Se não está, adiciona um novo item no array
            $carrinho[$id] = [
                "nome" => $produto->nome,
                "quantidade" => 1,
                "preco" => $produto->preco,
                "foto" => $produto->foto // Se tiver campo de imagem
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->route('carrinho.index')->with('sucesso', 'Produto adicionado!');
    }

    // ALTERAR QUANTIDADE
    public function atualizar(Request $request)
    {
        if($request->id && $request->quantidade){
            $carrinho = session()->get('carrinho');
            $carrinho[$request->id]["quantidade"] = $request->quantidade;
            session()->put('carrinho', $carrinho);
            return back()->with('sucesso', 'Carrinho atualizado!');
        }
    }

    // REMOVER ITEM
    public function remover(Request $request)
    {
        if($request->id) {
            $carrinho = session()->get('carrinho');
            if(isset($carrinho[$request->id])) {
                unset($carrinho[$request->id]);
                session()->put('carrinho', $carrinho);
            }
            return back()->with('sucesso', 'Produto removido!');
        }
    }
}