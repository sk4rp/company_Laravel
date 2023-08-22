@extends('layout')

@section('title', 'Редактировать событие')

@section('content')
    <div class="container">
        <h2>Редактировать событие</h2>

        <form action="{{ route('user-events.update', $userEvent) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $userEvent->title) }}">
            </div>

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $userEvent->description) }}</textarea>
            </div>

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="event_date">Дата события</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $userEvent->event_date) }}">
            </div>

            @error('event_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="start_time">Время начала</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $userEvent->start_time) }}">
            </div>

            @error('start_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="end_time">Время окончания</label>
                <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $userEvent->end_time) }}">
            </div>

            @error('end_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="location">Место</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $userEvent->location) }}">
            </div>

            @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="min_participants">Минимальное количество участников</label>
                <input type="number" class="form-control" id="min_participants" name="min_participants" value="{{ old('min_participants', $userEvent->min_participants) }}">
            </div>

            @error('min_participants')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="max_participants">Максимальное количество участников</label>
                <input type="number" class="form-control" id="max_participants" name="max_participants" value="{{ old('max_participants', $userEvent->max_participants) }}">
            </div>

            @error('max_participants')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="min_age">Минимальный возраст</label>
                <input type="number" class="form-control" id="min_age" name="min_age" value="{{ old('min_age', $userEvent->min_age) }}">
            </div>

            @error('min_age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="max_age">Максимальный возраст</label>
                <input type="number" class="form-control" id="max_age" name="max_age" value="{{ old('max_age', $userEvent->max_age) }}">
            </div>

            @error('max_age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="gender_specific">Только для определенного пола</label>
                <input type="hidden" name="gender_specific" value="0">
                <input type="checkbox" class="form-check-input" id="gender_specific" name="gender_specific" value="1" {{ old('gender_specific', $userEvent->gender_specific) == 1 ? 'checked' : '' }}>
            </div>

            @error('gender_specific')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <a href="{{ route('user-events.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
    </div>
@endsection
