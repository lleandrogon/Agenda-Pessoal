@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/verify.css') }}">
@endsection

@section('content')
    <div class="verify-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verifique seu email!</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Um link de verificação foi enviado para o seu email!
                            </div>
                        @endif

                        Antes de prosseguir verifique seu email e clique no link para validá-lo.
                        Se você não recebeu o email.
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique nesse link para enviar outro</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
