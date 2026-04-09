@extends('layout')

@section('conteudo')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="bi bi-cart3"></i> Seu Carrinho</h2>
        <a href="{{ route('catalogo') }}" class="btn btn-outline-secondary rounded-pill">
            <i class="bi bi-arrow-left"></i> Voltar ao Catálogo
        </a>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('sucesso') }}
        </div>
    @endif

    @if(session('carrinho') && count(session('carrinho')) > 0)
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3">Produto</th>
                                <th>Preço</th>
                                <th style="width: 150px;">Quantidade</th>
                                <th>Subtotal</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach(session('carrinho') as $id => $detalhes)
                                @php $total += $detalhes['preco'] * $detalhes['quantidade'] @endphp
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $detalhes['foto'] ? asset('img/produtos/'.$detalhes['foto']) : 'https://via.placeholder.com/50' }}" 
                                                 class="rounded me-3 shadow-sm" 
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <span class="fw-bold d-block">{{ $detalhes['nome'] }}</span>
                                                <small class="text-muted">ID: #{{ $id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>R$ {{ number_format($detalhes['preco'], 2, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('carrinho.update', $id) }}" method="POST">
                                            @csrf
                                            <div class="input-group input-group-sm">
                                                <input type="number" name="quantidade" value="{{ $detalhes['quantidade'] }}" 
                                                       min="1" class="form-control text-center" 
                                                       onchange="this.form.submit()">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="fw-bold text-dark">
                                        R$ {{ number_format($detalhes['preco'] * $detalhes['quantidade'], 2, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('carrinho.update', $id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantidade" value="0">
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card-footer bg-white p-4">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <form action="{{ route('carrinho.limpar') }}" method="POST" onsubmit="return confirm('Deseja realmente esvaziar seu carrinho?')">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger p-0 text-decoration-none small">
                                <i class="bi bi-x-circle me-1"></i> Esvaziar Carrinho
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5 class="text-muted mb-1">Total do Pedido:</h5>
                        <h2 class="text-success fw-bold mb-3">R$ {{ number_format($total, 2, ',', '.') }}</h2>
                        <button class="btn btn-success btn-lg px-5 rounded-pill shadow-sm">
                            <i class="bi bi-check2-circle"></i> Finalizar Compra
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 shadow-sm bg-white rounded-4 border">
            <i class="bi bi-cart-x display-1 text-muted opacity-25"></i>
            <h4 class="mt-4 fw-light">Seu carrinho está vazio.</h4>
            <p class="text-muted">Que tal conferir as novidades da nossa loja?</p>
            <a href="{{ route('catalogo') }}" class="btn btn-primary px-4 py-2 mt-2 rounded-pill">
                Explorar Catálogo
            </a>
        </div>
    @endif
</div>
@endsection