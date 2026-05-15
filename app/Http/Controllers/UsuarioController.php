<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    /**
     * LISTAR USUÁRIOS
     */
    public function index(Request $request)
{

    $busca = $request->buscar;

    $usuarios = User::where('name', 'LIKE', "%$busca%")
                    ->orWhere('email', 'LIKE', "%$busca%")
                    ->paginate(10);

    return view('usuarios.index', compact('usuarios'));

}

    /**
     * FORMULÁRIO DE CADASTRO
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * SALVAR USUÁRIO
     */
    public function store(Request $request)
{

    $request->validate([

        'name' => 'required|min:3',

        'email' => 'required|email|unique:users',

        'password' => 'required|min:6',

        'tipo' => 'required'

    ]);

    User::create([

        'name' => $request->name,

        'email' => $request->email,

        'password' => Hash::make($request->password),

        'tipo' => $request->tipo

    ]);

    return redirect()
        ->route('usuarios.index')
        ->with('success', 'Usuário cadastrado com sucesso!');
}

    /**
     * MOSTRAR USUÁRIO ESPECÍFICO
     */
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * FORMULÁRIO DE EDIÇÃO
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * ATUALIZAR USUÁRIO
     */
    public function update(Request $request, string $id)
{

    $request->validate([

        'name' => 'required|min:3',

        'email' => 'required|email',

        'tipo' => 'required'

    ]);

    $usuario = User::findOrFail($id);

    $usuario->update([

        'name' => $request->name,

        'email' => $request->email,

        'tipo' => $request->tipo

    ]);

    return redirect()
        ->route('usuarios.index')
        ->with('success', 'Usuário atualizado com sucesso!');
}

    /**
     * EXCLUIR USUÁRIO
     */
    public function destroy(string $id)
    {

        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário removido com sucesso!');
    }
}