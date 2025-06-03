@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/show.css') }}">
@endsection

@section('content')
    <div class="arrow-container">
        <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="show-container">
        <div class="title-container">
            <h1>{{ $event->title }}</h1>
        </div>

        <div class="body">
            {{ $event->body }}
        </div>
    </div>
@endsection