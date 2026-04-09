@extends('layout')

@section('conteudo')
<div class="container mt-4">
    
    @if(session('sucesso'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('sucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card mb-5 shadow-sm border-primary">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Cadastrar Novo Produto</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Preço</label>
                    <input type="number" step="0.01" name="preco" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Estoque</label>
                    <input type="number" name="estoque" class="form-control" value="0" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Categoria</label>
                    <select name="categoria_id" class="form-select" required>
                        @foreach($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success px-5">Salvar Produto</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($produtos as $p)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm text-center">
                    <img src="{{ $p->foto ? asset('img/produtos/'.$p->foto) : 'https://via.placeholder.com/150' }}" 
                         class="card-img-top" style="height: 160px; object-fit: cover;">
                    <div class="card-body">
                        <h6>{{ $p->nome }}</h6>
                        <p class="text-primary fw-bold">R$ {{ number_format($p->preco, 2, ',', '.') }}</p>
                        <small class="text-muted">Estoque: {{ $p->estoque }}</small>
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('produtos.destroy', $p->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Nenhum produto cadastrado.</p>
        @endforelse
    </div>
</div>
@endsection