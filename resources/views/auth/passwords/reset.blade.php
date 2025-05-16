@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/reset.css') }}">
@endsection

@section('content')
    <div class="reset-container">
        <div class="form-container">
            <h2 class="reset-title">Alterar Senha</h2>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email">
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
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="button-container">
                    <button type="submit" class="ap-button reset-button">Alterar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
