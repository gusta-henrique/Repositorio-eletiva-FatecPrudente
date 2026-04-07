@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <h2>🛒 Meu Carrinho (Sessão)</h2>

    @if(session('carrinho'))
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach(session('carrinho') as $id => $detalhes)
                    @php $total += $detalhes['preco'] * $detalhes['quantidade'] @endphp
                    <tr>
                        <td>{{ $detalhes['nome'] }}</td>
                        <td>R$ {{ number_format($detalhes['preco'], 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('carrinho.update') }}" method="POST" class="d-flex">
                                @csrf @method('PATCH')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantidade" value="{{ $detalhes['quantidade'] }}" class="form-control form-control-sm w-50">
                                <button type="submit" class="btn btn-sm btn-info ms-1">OK</button>
                            </form>
                        </td>
                        <td>R$ {{ number_format($detalhes['preco'] * $detalhes['quantidade'], 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('carrinho.remove') }}" method="POST">
                                @csrf @method('DELETE')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td colspan="2"><strong>R$ {{ number_format($total, 2, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="alert alert-warning">Seu carrinho está vazio!</div>
    @endif
    
    <a href="{{ route('produtos.index') }}" class="btn btn-primary">Continuar Comprando</a>
</div>
@endsection