@extends('layout')

@section('conteudo')

<div class="container mt-4">
    <h2>✏️ Editar Produto: {{ $produto->nome }}</h2>
    <hr>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <div class="mb-3">
            <label class="form-label">Nome do Produto</label>
            <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3">{{ $produto->descricao }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Preço</label>
                <input type="number" name="preco" step="0.01" class="form-control" value="{{ $produto->preco }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Estoque</label>
                <input type="number" name="estoque" class="form-control" value="{{ $produto->estoque }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ $produto->categoria_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection