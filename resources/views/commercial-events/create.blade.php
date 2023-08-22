@extends('layout')

@section('title', 'Создать коммерческое событие')

@section('content')
    <h1>Создать коммерческое событие</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('commercial-events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="event_date">Дата события</label>
            <input type="date" class="form-control" id="event_date" name="event_date">
        </div>
        <div class="form-group">
            <label for="location">Местоположение</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Создать</button>
        <a href="{{ route('commercial-events.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
    </form>
@endsection
