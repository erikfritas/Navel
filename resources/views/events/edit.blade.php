@extends('layouts.main')

@section('title', 'Editar')

@section('content')

    <section id="events-create-header" class="editing" style="background-image: url('/img/events/{{ $event->img }}')">
        <div id="events-create-container">
            <h1>Editando: "{{ $event->title }}"</h1>
            <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group"> {{-- Fazer com q seja opcional --}}
                    <label for="img">Imagem:</label>
                    <input type="file" name="img" id="img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" name="title" id="title" class="form-control"
                    value="{{ $event->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="date">Data do Evento:</label>
                    <input type="date" name="date" id="date" class="form-control"
                    value="{{ $event->date->format('Y-m-d') }}">
                </div>
                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ $event->city }}">
                </div>
                <select name="private" id="private">
                    <option value="0">Público</option>
                    <option value="1" {{ $event->private ? 'selected="selected"' : '' }}>Privado</option>
                </select>
                <div class="form-group">
                    <label for="title">Adicione infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cadeiras"
                        {{ in_array('Cadeiras', $event->items) ? 'checked' : '' }}> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Mesas"
                        {{ in_array('Mesas', $event->items) ? 'checked' : '' }}> Mesas
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Palco"
                        {{ in_array('Palco', $event->items) ? 'checked' : '' }}> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Comida"
                        {{ in_array('Comida', $event->items) ? 'checked' : '' }}> Comida
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Editar" class="form-control">
                </div>
            </form>
        </div>
    </section>

@endsection
