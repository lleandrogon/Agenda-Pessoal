@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/create.css') }}">
@endsection

@section('content')
    <div class="arrow-container">
        <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="create-container">
        <form action="{{ route('event.store') }}" method="POST">
            @csrf
            <h2 class="create-title">Criar Anotação</h2>
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Descrição:</label>
                <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="place" class="form-label">Local:</label>
                <input type="text" class="form-control" id="place" name="place">
                @error('place')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Data de Início:</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
                @error('start_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Data de Término:</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
                @error('end_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-container">
                <button type="submit" class="ap-button">Criar</button>
            </div>
        </form>
    </div>
@endsection