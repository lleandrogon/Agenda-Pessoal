@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/welcome.css') }}">
@endsection

@section('content')
    <div class="welcome-container">
        <h1 class="title">Agenda Pessoal</h1>
        <div class="button-container">
            <a href="{{ route('login') }}" class="ap-button no-underline mx-2">Login</a>
        </div>
    </div>
@endsection
