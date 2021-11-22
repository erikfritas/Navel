@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <section class="dashboard">
        <h1>{{ $user->name }}</h1>
        <hr>
        <div class="dashboard-events">
            <h2>Meus eventos:</h2>
            @if (count($events) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Localização</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $key => $event)
                            <tr>
                                <td scope="col">{{ $key + 1 }}</td>
                                <td scope="col">
                                    <a href="/events/{{ $event->id }}">{{ $event->title }}</a>
                                </td>
                                <td scope="col">{{ count($event->users) }}</td>
                                <td scope="col">{{ $event->city }}</td>
                                <td scope="col" class="d-flex" style="column-gap: 5px;">
                                    <a href="/events/edit/{{ $event->id }}" class="btn edit">Editar</a>
                                    <form action="/events/{{ $event->id }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                        type="submit"
                                        class="btn delete">
                                            Deletar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Você não possui eventos ainda... Deseja <a href="/events/create">criar um agora</a>?</p>
            @endif
        </div>
        <hr>
        <div class="dashboard-events">
            <h2>Eventos que estou participando:</h2>
            @if (count($events) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Localização</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventsAsParticipant as $key => $event)
                            <tr>
                                <td scope="col" class="id">{{ $key + 1 }}</td>
                                <td scope="col" class="title_">
                                    <a href="/events/{{ $event->id }}">{{ $event->title }}</a>
                                </td>
                                <td scope="col">{{ count($event->users) }}</td>
                                <td scope="col">{{ $event->city }}</td>
                                <td scope="col" class="d-flex" style="column-gap: 5px;">
                                    <button class="btn delete window-open" id="btn-{{ $key }}">Sair do evento</button>
                                    <p class="event_id" style="display: none;">{{ $event->id }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Você não está participando de nenhum evento ainda...
                    Deseja <a href="/">participar de um agora</a>?</p>
            @endif
        </div>
    </section>

    <div class="window-msg disable">
        <div class="window-menu"><ion-icon name="arrow-forward-circle-outline"></ion-icon></div>
        <h1 class="default">Tem certeza de que deseja sair deste evento?</h1>
        <p class="text-info">O "<span class="title_"></span>" parece ser bem top...</p>
        <form method="post">
            @csrf
            @method('DELETE')

            <a class="btn edit"
                onclick="event.preventDefault(); this.closest('form').submit()">Sair do evento</a>
        </form>
    </div>

@endsection
