@extends('layouts.app')

@section('conteudo')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            Escolha sua loja
        </h1>

        <p class="text-muted">
            Finalize sua compra pelo WhatsApp
        </p>

    </div>

    <div class="row justify-content-center">

        @foreach($lojas as $loja)

            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-body text-center p-5">

                        <h3 class="fw-bold mb-3">
                            {{ $loja->nome }}
                        </h3>

                        <p class="text-muted mb-4">
                            {{ $loja->cidade }}
                        </p>

                        <a href="https://wa.me/{{ $loja->whatsapp }}"
                           target="_blank"
                           class="btn btn-success rounded-pill px-4">

                            <i class="bi bi-whatsapp"></i>

                            Entrar em contato

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection