@extends('layout')

@section('title', 'Редактировать коммерческое событие')

@section('content')
    <h1>Редактировать коммерческое событие</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('commercial-events.update', $commercialEvent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $commercialEvent->title }}">
        </div>
        <div class="form-group">
            <label for="event_date">Дата события</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $commercialEvent->event_date }}">
        </div>
        <div class="form-group">
            <label for="location">Местоположение</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $commercialEvent->location }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ $commercialEvent->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <a href="{{ route('commercial-events.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
@endsection
