@extends('layout')

@section('title', 'Подробности пользовательского события')

@section('content')
    <h1>Подробности пользовательского события</h1>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Заголовок:</td>
                <td>{{ $userEvent->title }}</td>
            </tr>
            <tr>
                <td>Описание:</td>
                <td>{{ $userEvent->description }}</td>
            </tr>
            <tr>
                <td>Дата:</td>
                <td>{{ $userEvent->event_date }}</td>
            </tr>
            <tr>
                <td>Местоположение:</td>
                <td>{{ $userEvent->location }}</td>
            </tr>
            <tr>
                <td>Минимальное количество участников:</td>
                <td>{{ $userEvent->min_participants }}</td>
            </tr>
            <tr>
                <td>Максимальное количество участников:</td>
                <td>{{ $userEvent->max_participants }}</td>
            </tr>
            <tr>
                <td>Минимальный возраст:</td>
                <td>{{ $userEvent->min_age }}</td>
            </tr>
            <tr>
                <td>Максимальный возраст:</td>
                <td>{{ $userEvent->max_age }}</td>
            </tr>
        </table>
    </div>

    <a href="{{ route('user-events.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection
