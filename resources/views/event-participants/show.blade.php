@extends('layout')

@section('title', 'Информация об участнике события')

@section('content')
    <h1>Информация об участнике события</h1>

    <table class="table table-bordered">
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td>Событие</td>
            <td>{{ $eventParticipant->event->title }}</td>
        </tr>
        <tr>
            <td>Участник</td>
            <td>{{ $eventParticipant->user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $eventParticipant->user->email }}</td>
        </tr>
    </table>

    <a href="{{ route('event-participants.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection
