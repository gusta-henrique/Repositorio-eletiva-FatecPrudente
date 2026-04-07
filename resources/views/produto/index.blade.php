@extends('layout')

@section('conteudo')
<div class="row">
    <div class="col-12 mb-4">
        <h2 class="display-5">Nossos Produtos</h2>
        <hr>
    </div>

    @foreach($produtos as $produto)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="{{ $produto->nome }}">
            
            <div class="card-body">
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <p class="card-text text-muted">{{ Str::limit($produto->descricao, 50) }}</p>
                <h4 class="text-primary">R$ {{ number_format($produto->preco, 2, ',', '.') }}</h4>
            </div>
            
            <div class="card-footer bg-white border-top-0">
                <div class="d-grid">
                    <a href="{{ route('carrinho.add', ['id' => $produto->id]) }}" class="btn btn-success">
                        <i class="bi bi-cart-plus"></i> Adicionar ao Carrinho
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection