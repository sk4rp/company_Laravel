@extends('layout')

@section('title', 'Коммерческие события')

@section('content')
    <h1>Список коммерческих событий</h1>
    <a href="{{ route('commercial-events.create') }}" class="btn btn-primary">Создать коммерческое событие</a>

    <table class="table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Дата события</th>
            <th>Местоположение</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commercialEvents as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->event_date}}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->description }}</td>
                <td>
                    <a href="{{ route('commercial-events.show', $event) }}" class="btn btn-info btn-sm">Просмотр</a>
                    <a href="{{ route('commercial-events.edit', $event) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('commercial-events.destroy', $event) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
