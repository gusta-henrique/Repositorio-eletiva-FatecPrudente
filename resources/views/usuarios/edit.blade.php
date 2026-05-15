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

<form action="{{ route('usuarios.update', $usuario->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="name"
           value="{{ $usuario->name }}"
           class="form-control mb-3">

    <input type="email"
           name="email"
           value="{{ $usuario->email }}"
           class="form-control mb-3">

    <select name="tipo"
            class="form-control mb-3">

        <option value="cliente"
            {{ $usuario->tipo == 'cliente' ? 'selected' : '' }}>

            Cliente

        </option>

        <option value="admin"
            {{ $usuario->tipo == 'admin' ? 'selected' : '' }}>

            Admin

        </option>

    </select>

    <button class="btn btn-primary">
        Atualizar
    </button>

</form>

</div>

@endsection