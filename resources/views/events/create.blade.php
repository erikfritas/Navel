@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <section id="events-create-header">
        <div id="events-create-container">
            <h1>Crie um evento <ion-icon name="heart"></ion-icon></h1>
            <form action="/events" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group"> {{-- Fazer com q seja opcional --}}
                    <label for="img">Imagem:</label>
                    <input type="file" name="img" id="img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Data do Evento:</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>
                <select name="private" id="private">
                    <option value="0">Privado</option>
                    <option value="1">Público</option>
                </select>
                <div class="form-group">
                    <label for="title">Adicione infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Mesas"> Mesas
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Comida"> Comida
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Criar" class="form-control">
                </div>
            </form>
        </div>
    </section>

@endsection
