<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    /**
     * Lista todas as lojas cadastradas
     */
    public function index()
    {
        $lojas = Loja::all();
        return view('loja.index', compact('lojas'));
    }

    /**
     * Abre o formulário de cadastro
     */
    public function create()
    {
        return view('loja.create');
    }

    /**
     * Salva a nova loja no banco de dados
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'cnpj' => 'required|unique:lojas,cnpj',
            'telefone' => 'nullable',
            'endereco' => 'nullable'
        ], [
            'nome.required' => 'O nome da loja é obrigatório.',
            'cnpj.required' => 'O CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado em outra loja.'
        ]);

        Loja::create($request->all());

        return redirect()->route('lojas.index')->with('sucesso', 'Loja cadastrada com sucesso!');
    }

    /**
     * Abre o formulário de edição para uma loja específica
     */
    public function edit($id)
    {
        $loja = Loja::findOrFail($id);
        return view('loja.edit', compact('loja'));
    }

    /**
     * Atualiza os dados da loja no banco
     */
    public function update(Request $request, $id)
    {
        $loja = Loja::findOrFail($id);

        $request->validate([
            'nome' => 'required|min:3',
            'cnpj' => 'required|unique:lojas,cnpj,' . $id, // Ignora o próprio ID na verificação de único
        ]);

        $loja->update($request->all());

        return redirect()->route('lojas.index')->with('sucesso', 'Loja atualizada com sucesso!');
    }

    /**
     * Remove a loja do sistema
     */
    public function destroy($id)
    {
        $loja = Loja::findOrFail($id);
        $loja->delete();

        return redirect()->route('lojas.index')->with('sucesso', 'Loja excluída com sucesso!');
    }
}