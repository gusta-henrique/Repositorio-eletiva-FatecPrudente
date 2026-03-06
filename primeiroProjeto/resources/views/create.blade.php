@extends('layout')

@section('conteudo')
<h1>categoria</h1>
<form method="post" action="/categorias>
@CSRF

    <div class="mb-3">
              <label for="nome" class="form-label">informe o nome: </label>
              <input type="text" id="nome" name="nome" class="form-control" required="">
            </div><div class="mb-3">
              <label for="descricao" class="form-label">informe a descricao: </label>
              <input type="text" id="descricao" name="descricao" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection