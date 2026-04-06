@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <h2>👤 Cadastrar Novo Usuário</h2>
    <hr>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Nome Completo</label>
            <input type="text" name="name" class="form-control" required placeholder="Ex: Henrique Silva">
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required placeholder="exemplo@email.com">
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required placeholder="Mínimo 6 caracteres">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Usuário</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection