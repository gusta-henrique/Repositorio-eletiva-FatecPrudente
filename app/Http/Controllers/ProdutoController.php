<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        $categorias = Categoria::all();
        return view('produto.index', compact('produtos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required',
            'estoque' => 'required|integer',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/produtos'), $nomeImagem);
            $dados['foto'] = $nomeImagem;
        }

        Produto::create($dados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produto.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $dados = $request->all();

        if ($request->hasFile('foto')) {
            if ($produto->foto) {
                File::delete(public_path('img/produtos/' . $produto->foto));
            }
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/produtos'), $nomeImagem);
            $dados['foto'] = $nomeImagem;
        }

        $produto->update($dados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        if ($produto->foto) {
            File::delete(public_path('img/produtos/' . $produto->foto));
        }
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído!');
    }

    public function catalogo()
    {
        $produtos = Produto::all();
        return view('catalogo', compact('produtos'));
    }

    public function adicionarCarrinho(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        // Pega o carrinho da sessão ou cria um array vazio
        $carrinho = session()->get('carrinho', []);

        // Se o produto já está no carrinho, aumenta a quantidade
        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            // Se não está, adiciona os dados dele
            $carrinho[$id] = [
                "nome" => $produto->nome,
                "quantidade" => 1,
                "preco" => $produto->preco,
                "foto" => $produto->foto
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back()->with('sucesso', 'Produto adicionado ao carrinho!');
    }

    public function exibirCarrinho()
    {
        // O ponto substitui a barra da pasta (carrinho/index)
        return view('carrinho.index');
    }

    public function atualizarCarrinho(Request $request, $id)
    {
        $carrinho = session()->get('carrinho');

        if (isset($carrinho[$id])) {
            // Se a quantidade for menor que 1, removemos o item, senão atualizamos
            if ($request->quantidade <= 0) {
                unset($carrinho[$id]);
            } else {
                $carrinho[$id]['quantidade'] = $request->quantidade;
            }
            session()->put('carrinho', $carrinho);
        }

        return redirect()->back()->with('sucesso', 'Carrinho atualizado!');
    }

    public function limparCarrinho()
    {
        // Remove apenas a chave 'carrinho' da sessão
        session()->forget('carrinho');

        return redirect()->route('catalogo')->with('sucesso', 'Carrinho esvaziado com sucesso!');
    }
}
