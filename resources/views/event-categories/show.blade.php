@extends('layout')

@section('title', 'Подробности категории событий')

@section('content')
    <h1>Подробности категории событий</h1>

    <table class="table table-bordered">
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td>Название:</td>
            <td>{{ $eventCategory->name }}</td>
        </tr>
    </table>

    <a href="{{ route('event-categories.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection
