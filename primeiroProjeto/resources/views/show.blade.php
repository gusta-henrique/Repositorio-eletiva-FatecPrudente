@extends('layout')

@section('conteudo')
<h1>Consultar categoria</h1>
<form method="post" action="/categorias/{{$categoria->id}}>
@CSRF
@METHOD('DELETE')

        <div class="mb-3">
              <P>Nome: {{$categoria->nome}}<strong></strong></P>
        </div>
        
        <div class="mb-3">
            <P>Descricao: {{$categoria->descricao}}<strong></strong></P>
        </div>
    <button type="submit" class="btn btn-danger">excluir o registro</button>
    <a href="/categorias" class="btn btn-secondary">Voltar</a>
</form>
@endsection