@extends('layout')

@section('conteudo')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="display-4 fw-bold">Nosso Catálogo</h2>
            <p class="text-muted">Confira as melhores ofertas para você</p>
        </div>
    </div>

    <div class="row">
        @forelse($produtos as $p)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 transition-hover">
                <div class="position-relative">
                    <img src="{{ $p->foto ? asset('img/produtos/'.$p->foto) : 'https://via.placeholder.com/300x200?text=Sem+Foto' }}"
                        class="card-img-top"
                        style="height: 220px; object-fit: cover;"
                        alt="{{ $p->nome }}">

                    @if($p->estoque <= 0)
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">Esgotado</span>
                        @endif
                </div>

                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title fw-bold text-dark mb-2">{{ $p->nome }}</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        {{ Str::limit($p->descricao, 60) }}
                    </p>

                    <div class="mt-auto">
                        <h4 class="text-success fw-bold">R$ {{ number_format($p->preco, 2, ',', '.') }}</h4>

                        <form action="{{ route('carrinho.adicionar', $p->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm {{ $p->estoque <= 0 ? 'disabled' : '' }}">
                                <i class="bi bi-cart-plus-fill me-2"></i> Adicionar ao Carrinho
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">Nenhum produto disponível no momento.</h4>
        </div>
        @endforelse
    </div>
</div>

<style>
    .transition-hover:hover {
        transform: translateY(-5px);
        transition: 0.3s ease;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection