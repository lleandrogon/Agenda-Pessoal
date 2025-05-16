@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <div class="row">
            <div class="login col-md-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="login-title-container">
                        <h2 class="login-title">Login</h2>
                        <p class="login-subtitle">Faça o login para acessar sua conta.</p>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                            <div class="forgot-password-container">
                            @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    Esqueceu a senha?
                                </a>
                            @endif
                            </div>
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="login-button-container">
                            <button type="submit" class="ap-button login-button">Entrar</button>
                        </div>
                        @if ($errors->has('auth'))
                            <div class="error mt-3">{{ $errors->first('auth') }}</div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="register col-md-6">
                <div class="register-title-container">
                    <h2 class="register-title">Registrar-se</h2>
                    <p class="register-subtitle">Não tem conta? registre-se para se juntar a nós!</p>
                </div>
                <div class="register-button-container">
                    <a href="{{ route('register') }}" class="ap-button register-button">Registrar-se</a>
                </div>
            </div>
        </div>
    </div>
@endsection
