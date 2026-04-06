<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria; // Importante para carregar as categorias no select
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', compact('produtos'));
    }

    // Método que abre a tela de cadastro
    public function create()
    {
        // Buscamos as categorias para o usuário escolher uma no formulário
        $categorias = Categoria::all();
        return view('produto.create', compact('categorias'));
    }

    // Método que recebe os dados do formulário e salva no banco
    public function store(Request $request)
    {
        // Validação básica
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('sucesso', 'Produto criado com sucesso!');
    }

    public function edit($id)
    {
        // Busca o produto pelo ID ou dá erro 404 se não existir
        $produto = Produto::findOrFail($id);

        // Busca as categorias para o select
        $categorias = Categoria::all();

        return view('produto.edit', compact('produto', 'categorias'));
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído com sucesso!');
    }

    // Método para salvar as alterações
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required'
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado!');
    }
}
