@extends('layout')

@section('conteudo')

<div class="container">

    <h2>Usuários</h2>

    <a href="{{ route('usuarios.create') }}"
       class="btn btn-primary mb-3">

        Novo Usuário

    </a>

    <form method="GET"
      action="{{ route('usuarios.index') }}"
      class="mb-4">

    <input type="text"
           name="buscar"
           class="form-control"
           placeholder="Buscar usuário...">

    </form>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

            @foreach($usuarios as $u)

            <tr>

                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->tipo }}</td>

                <td>

                    <a href="{{ route('usuarios.edit', $u->id) }}"
                       class="btn btn-warning">

                        Editar

                    </a>

                    <form action="{{ route('usuarios.destroy', $u->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>
    {{ $usuarios->links() }}

</div>

@endsection