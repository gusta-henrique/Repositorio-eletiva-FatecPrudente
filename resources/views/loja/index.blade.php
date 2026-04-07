@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>🏬 Lojas Cadastradas</h2>
        <a href="{{ route('lojas.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> + Nova Loja
        </a>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome da Loja</th>
                        <th>CNPJ</th>
                        <th>Telefone</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lojas as $loja)
                    <tr>
                        <td>{{ $loja->id }}</td>
                        <td>{{ $loja->nome }}</td>
                        <td>{{ $loja->cnpj }}</td>
                        <td>{{ $loja->telefone ?? 'Não informado' }}</td>
                        <td class="text-center">
                            <a href="{{ route('lojas.edit', $loja->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <form action="{{ route('lojas.destroy', $loja->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir esta loja?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if($lojas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Nenhuma loja cadastrada até o momento.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection