@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/email.css') }}">
@endsection

@section('content')
    <div class="email-container">
        <div class="form-container">
            <h2 class="form-title">Resetar Senha</h2>
            <form action="{{ route('password.email') }}" method="POST">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="send-button-container mb-3">
                    <button type="submit" class="ap-button send-button">Enviar Email</button>
                </div>
                <div>
                    @if ($errors->has('wait'))
                        <div class="error">{{ $errors->first('wait') }}</div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection


