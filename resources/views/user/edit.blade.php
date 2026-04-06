@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <h2>✏️ Editar Usuário: {{ $user->name }}</h2>
    <hr>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-3">
            <label class="form-label">Nome Completo</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha (deixe em branco para não alterar)</label>
            <input type="password" name="password" class="form-control" placeholder="Digite apenas se quiser mudar a senha">
            <small class="text-muted">Se você não digitar nada, a senha atual será mantida.</small>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection