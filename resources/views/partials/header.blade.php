<link rel="stylesheet" href="{{ asset('css/components/header.css') }}">

<header>
    <div class="row">
        <div class="col-6">
            <img src="{{ asset('img/agenda.png') }}" alt="Logo de Agenda" class="agenda">
        </div>
        <div class="col-lg-6 d-none d-lg-flex justify-content-end align-items-center">
            <ul class="navbar d-flex">
                <li class="no-makers"><a href="{{ route('home') }}" class="no-underline">Home</a></li>
                <li class="no-makers"><a href="{{ route('event.create') }}" class="no-underline">Criar</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li class="no-makers"><button type="submit" class="no-underline">Logout</button></li>
                </form>
            </ul>
        </div>
        <div class="col-6 d-flex d-lg-none justify-content-end align-items-center">
            <i class="fa-solid fa-bars" onclick="toggleNav()"></i>
        </div>
    </div>
    <div class="d-none d-lg-none" id="responsiveNav">
        <ul class="responsive-navbar d-flex">
            <li class="no-makers"><a href="{{ route('home') }}" class="no-underline">Home</a></li>
            <li class="no-makers"><a href="{{ route('event.create') }}" class="no-underline">Criar</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <li class="no-makers"><button type="submit" class="no-underline">Logout</button></li>
            </form>
        </ul>
    </div>
</header>

<script src="{{ asset('js/header.js') }}"></script>