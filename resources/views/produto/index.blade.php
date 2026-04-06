@extends('layout')

@section('conteudo')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📦 Gerenciar Produtos</h2>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary"> + Novo Produto</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nome }}</td>
                    <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                    <td>{{ $p->estoque }} unidades</td>
                    <td>
                        <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhum produto cadastrado ainda.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection