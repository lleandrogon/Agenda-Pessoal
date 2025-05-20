@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/home.css') }}">
@endsection

@section('content')
    @include('partials.header')

    <div class="home-container">
        <h2 class="title">Minha Agenda</h2>
        
        @if (session('new'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success text-center w-50">
                    {{ session('new') }}
                </div>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Lugar</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $key => $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->place }}</td>
                        <td>{{ date('d/m/Y', strtotime($event->start_date)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($event->end_date)) }}</td>
                        <td><a href="{{ route('event.edit', $event->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <td><i class="fa-solid fa-x"></i></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
