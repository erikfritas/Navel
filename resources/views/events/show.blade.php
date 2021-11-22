@extends('layouts.main')

@section('title', 'Evento')

@section('content')

    <section id="evento_">
        <div id="evento_-article">
            @if ($event->img)
                <img src="/img/events/{{ $event->img }}" alt="">
            @else
                <img src="/img/events/festa.jpg" alt="">
            @endif
            <article>
                <h1>{{ $event->title }}</h1>
                <p class="text-muted">
                    Evento publicado em {{ date('d/m/Y', strtotime($event->updated_at)) }}
                </p>
                <p class="text-primary">
                    Participantes: {{ count($event->users) }}
                </p>
                <p class="text-description">{{ $event->description }}</p>
                <p class="text-success">Data prevista: {{ date('d/m/Y', strtotime($event->date)) }}</p>
                <p>Evento: <span class="text-info">{{ $event->private ? 'Privado' : 'Público'}}</span></p>
                <details>
                    <summary>Detalhes</summary>
                    <div>Local do Evento: {{ $event->city }}</div>
                    <div>Dono do evento: {{ $owner['name'] }}</div>
                    @if ($event->items)
                        <br>
                        <div>O evento conta com:</div>
                        <ul id="items-list">
                            @foreach ($event->items as $_item)
                                <li><ion-icon name="play-outline"></ion-icon> {{ $_item }}</li>
                            @endforeach
                        </ul>
                    @endif
                </details>
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <a href="/events/join/{{ $event->id }}"
                            id="event-join-submit"
                            class="btn btn-success"
                            onclick="event.preventDefault();
                            this.closest('form').submit()"
                            >
                            Confirmar Presença
                        </a>
                    </div>
                </form>
            </article>
        </div>
    </section>

@endsection
