@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <div class="register">
            <h2 class="register-title">Registrar-se</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="mb-3">
                        <input id="name" type="text" class="form-control" name="name" placeholder="Nome Completo">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Senha">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha">
                        @error('password_confirmation')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button-container">
                        <button type="submit" class="ap-button register-button mb-4">Registrar-se</button>
                        <a href="{{ route('login') }}" class="login-link">Já tem conta? Faça o login!</a>
                    </div>
                </div>
            </form>
        </div>
@endsection
