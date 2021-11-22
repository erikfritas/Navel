<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Manavents</title>
    {{-- CSS --}}
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

    @foreach ([
        'others',
        'nav',
        'search',
        'events',
        'dashboard',
        'footer'
    ] as $style)
        <link rel="stylesheet" href="{{ asset("css/$style.css") }}">
    @endforeach

    {{-- END CSS --}}

    {{-- JS --}}
    <script src="{{ asset('js/script.js') }}"></script>
    @if (session('msg'))
        <script>
            alert('{{ session('msg') }}')
        </script>
    @endif
    {{-- END JS --}}
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">Manavents <p>Gerenciador de eventos</p></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                    @endguest
                    @auth
                        @if (!Request::is('dashboard'))
                            <li><a href="/dashboard" class="nav-link">Perfil</a></li>
                        @endif
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" class="nav-link"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <p>&copy; Copyright - 2021</p>
        <p id="developer" class="text-info">
            by <a class="text-success" href="https://www.instagram.com/erikfritas" target="_blank">@@erikfritas</a>
        </p>
    </footer>

    {{-- ION-ICON --}}
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
