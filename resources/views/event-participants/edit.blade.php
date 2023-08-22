@extends('layout')

@section('title', 'Редактирование участника события')

@section('content')
    <h1>Редактирование участника события</h1>

    <form method="POST" action="{{ route('event-participants.update', $eventParticipant->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="event_id">Выберите событие:</label>
            <select name="event_id" id="event_id" class="form-control">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $event->id === $eventParticipant->event_id ? 'selected' : '' }}>{{ $event->event->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Выберите участника:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id === $eventParticipant->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Сохранить изменения</button>
    </form>

    <a href="{{ route('event-participants.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
@endsection
