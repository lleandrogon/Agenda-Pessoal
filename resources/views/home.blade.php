@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/home.css') }}">
@endsection

@section('content')
    @include('partials.header')

    <div class="home-container">
        <h2 class="title">Minha Agenda</h2>

        <form action="{{ route('event.search') }}" method="GET" class="search-container">
            <input type="search" class="search-input" name="search"><button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        
        @if (session('new'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success text-center w-50">
                    {{ session('new') }}
                </div>
            </div>
        @endif

        <div class="excel-container">
            <form action="{{ route('event.export') }}" method="GET">
                <button type="submit" class="excel-button">Exportar Excel</button>
            </form>
        </div>

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
                        <td><a href="{{ route('event.show', $event->id) }}" class="event-link">{{ $event->title }}</a></td>
                        <td>{{ $event->place }}</td>
                        <td>{{ date('d/m/Y', strtotime($event->start_date)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($event->end_date)) }}</td>
                        <td><a href="{{ route('event.edit', $event->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <td><button class="x-button" type="submit"><i class="fa-solid fa-x"></i></button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Page navigation example" class="paginate-nav d-flex justify-content-center w-100">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{ $events->previousPageUrl() }}">Voltar</a></li>

                @for ($e = 1; $e <= $events->lastPage(); $e++)
                    <li class="page-item {{ $events->currentPage() == $e ? 'active' : '' }}"><a class="page-link" href="{{ $events->url($e) }}">{{ $e }}</a></li>
                @endfor
                
                <li class="page-item"><a class="page-link" href="{{ $events->nextPageUrl() }}">Avançar</a></li>
            </ul>
        </nav>
    </div>
@endsection
