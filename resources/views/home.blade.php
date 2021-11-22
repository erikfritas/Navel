@extends('layouts.main')

@section('title', 'HOME')

@section('content')

    <header id="header-home">
        <h1 class="default">Bem vindo a Home</h1>
    </header>

    <div id="search-container">
        <h1>Pesquise um evento</h1>
        <form action="/" method="get" class="form-group">
            <label for="search">Nome do Evento</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="exemplo: evento de JS">
        </form>
    </div>

    <hr class="w80">

    <div id="events-container">
        
        @if ($search)
            <h1>Procurando por {{ $search }}...</h1>
        @else
            <h1>Eventos quentes...</h1>
        @endif

        <div id="events-container-articles">
            @foreach($events as $event)
                <article class="card">
                    <img src="/img/events/{{ $event->img ? $event->img : 'festa.jpg' }}" alt="">
                    <p class="text-muted">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5>{{ $event->title }} | {{ $event->city }}</h5>
                    <p>{{ $event->description }}</p>

                    <p class="text-muted">
                        @if (count($event->users) > 1)
                            {{ count($event->users) }} Participantes
                        @elseif (count($event->users) == 1)
                            1 Participante
                        @else
                            Nenhum participante, seja o primeiro!
                        @endif
                    </p>

                    @if ($event->private)
                        <span class="text-primary">
                            Evento privado
                        </span>
                    @else
                        <span class="text-success">
                            Evento público
                        </span>
                    @endif

                    <a href="/events/{{ $event->id }}" class="btn btn-primary mt-2">Saiba mais clicando aqui...</a>
                </article>
            @endforeach
            @if (count($events) === 0 && $search)
                <div style="text-align: center;">
                    <p>Lamentamos, mas não encontramos nenhum evento com o título "{{ $search }}" :(</p>
                    <a href="/" class="text-info">Ver todos...</a>
                </div>
            @elseif (count($events) === 0)
                <p>Lamentamos, mas não há eventos suficientes :(</p>
            @endif
        </div>
    </div>
    
@endsection
