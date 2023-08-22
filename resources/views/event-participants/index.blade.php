@extends('layout')

@section('title', 'Участники коммерческих событий')

@section('content')
    <h1>Список участников коммерческих событий</h1>
    <a href="{{ route('event-participants.create') }}" class="btn btn-primary">Создать участника</a>
    @if ($participants->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Событие</th>
                <th>Участник</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->event->title }}</td>
                    <td>{{ $participant->user->name }}</td>
                    <td>{{ $participant->user->email }}</td>
                    <td>
                        <a href="{{ route('event-participants.show', $participant->id) }}" class="btn btn-info btn-sm">Просмотр</a>
                        <a href="{{ route('event-participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('event-participants.destroy', $participant->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Участников событий пока нет.</p>
    @endif
@endsection
