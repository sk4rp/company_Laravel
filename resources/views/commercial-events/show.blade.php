@extends('layout')

@section('title', 'Просмотр коммерческого события ')

@section('content')
    <h1>Просмотр коммерческого события</h1>

    <table class="table table-bordered">
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td>Название</td>
            <td>{{ $commercialEvent->title }}</td>
        </tr>
        <tr>
            <td>Описание</td>
            <td>{{ $commercialEvent->description }}</td>
        </tr>
        <tr>
            <td>Дата события</td>
            <td>{{ $commercialEvent->event_date }}</td>
        </tr>
        <tr>
            <td>Местоположение</td>
            <td>{{ $commercialEvent->location }}</td>
        </tr>
    </table>

    <a href="{{ route('commercial-events.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection
