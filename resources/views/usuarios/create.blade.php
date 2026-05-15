@if($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->all() as $erro)

                <li>{{ $erro }}</li>

            @endforeach

        </ul>

    </div>

@endif

@extends('layout')

@section('conteudo')

<div class="container">

    <h2>Novo Usuário</h2>

    <form action="{{ route('usuarios.store') }}"
          method="POST">

        @csrf

        <input type="text"
               name="name"
               placeholder="Nome"
               class="form-control mb-3">

        <input type="email"
               name="email"
               placeholder="Email"
               class="form-control mb-3">

        <input type="password"
               name="password"
               placeholder="Senha"
               class="form-control mb-3">

        <select name="tipo"
                class="form-control mb-3">

            <option value="cliente">
                Cliente
            </option>

            <option value="admin">
                Admin
            </option>

        </select>

        <button class="btn btn-success">
            Salvar
        </button>

    </form>

</div>

@endsection