<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
         $produtos = Produto::with('loja', 'categoria')->get();
        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view("produto.create", compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required',
            'loja_id' => 'required'
        ]);

         try{
             Produto::create($request->all());
        } catch(Exception $e){
             Log::error('Erro ao inserir produto: '. $e->getMessage());
        }

    return redirect()->route('produtos.index');
}

    public function edit($id)
    {
         $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();

        return view('produto.edit', compact('categorias', 'produto'));
    }
}
