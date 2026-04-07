@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <h2>🏬 Cadastrar Nova Loja</h2>
    <hr>

    <form action="{{ route('lojas.store') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="form-label">Nome da Loja</label>
                <input type="text" name="nome" class="form-control" required placeholder="Ex: Filial Presidente Prudente">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">CNPJ</label>
                <input type="text" name="cnpj" class="form-control" required placeholder="00.000.000/0001-00">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Endereço Completo</label>
            <input type="text" name="endereco" class="form-control" placeholder="Rua, Número, Bairro e Cidade">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone de Contato</label>
            <input type="text" name="telefone" class="form-control" placeholder="(18) 0000-0000">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Salvar Loja</button>
            <a href="{{ route('lojas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection