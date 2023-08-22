@extends('layout')

@section('title', 'Пользовательские события')

@section('content')
    <h1>Мои события</h1>
    <a href="{{ route('user-events.create') }}" class="btn btn-primary mb-2">Создать событие</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Дата</th>
            <th scope="col">Местоположение</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($userEvents as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <a href="{{ route('user-events.show', $event->id) }}" class="btn btn-info btn-sm">Просмотр</a>
                    <a href="{{ route('user-events.edit', $event->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('user-events.destroy', $event->id) }}" method="POST" style="display: inline;">
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
