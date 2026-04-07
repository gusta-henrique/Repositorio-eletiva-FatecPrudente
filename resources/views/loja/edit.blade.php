@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <h2>✏️ Editar Loja: {{ $loja->nome }}</h2>
    <hr>

    <form action="{{ route('lojas.update', $loja->id) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="form-label">Nome da Loja</label>
                <input type="text" name="nome" class="form-control" value="{{ $loja->nome }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">CNPJ</label>
                <input type="text" name="cnpj" class="form-control" value="{{ $loja->cnpj }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Endereço Completo</label>
            <input type="text" name="endereco" class="form-control" value="{{ $loja->endereco }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone de Contato</label>
            <input type="text" name="telefone" class="form-control" value="{{ $loja->telefone }}">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Atualizar Dados</button>
            <a href="{{ route('lojas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection