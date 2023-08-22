@extends('layout')

@section('title', 'Добавление участника события')

@section('content')
    <h1>Добавление участника события</h1>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('event-participants.store') }}">
        @csrf
        <div class="form-group">
            <label for="event_id">Выберите событие:</label>
            <select name="event_id" id="event_id" class="form-control">
                @foreach ($events as $event)
                    <option value="{{ $event->event_id }}">{{ $event->event->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Выберите участника:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Создать</button>
        <a href="{{ route('event-participants.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
    </form>
@endsection
