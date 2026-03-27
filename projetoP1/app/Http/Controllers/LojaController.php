<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class LojaController extends Controller
{
    public function index()
    {
        $lojas = Loja::all();
        return view('loja.index', compact('lojas'));
    }

    public function create()
    {
        return view('loja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'whatsapp' => 'required'
        ]);

        try {
            Loja::create($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao cadastrar loja: ' . $e->getMessage());
        }

        return redirect()->route('lojas.index');
    }

    public function show($id)
    {
        $loja = Loja::with('produtos')->findOrFail($id);
        return view('loja.show', compact('loja'));
    }

    public function edit($id)
    {
        $loja = Loja::findOrFail($id);
        return view('loja.edit', compact('loja'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'whatsapp' => 'required'
        ]);

        try {
            $loja = Loja::findOrFail($id);
            $loja->update($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao atualizar loja: ' . $e->getMessage());
        }

        return redirect()->route('lojas.index');
    }

    public function destroy($id)
    {
        try {
            $loja = Loja::findOrFail($id);
            $loja->delete();
        } catch (Exception $e) {
            Log::error('Erro ao excluir loja: ' . $e->getMessage());
        }

        return redirect()->route('lojas.index');
    }
}