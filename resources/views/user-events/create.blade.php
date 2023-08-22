@extends('layout')

@section('title', 'Создать событие')

@section('content')
    <div class="container">
        <h1>Создать событие</h1>
        <form method="POST" action="{{ route('user-events.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Название события:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required></textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="event_date">Дата события:</label>
                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" required>
                @error('event_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_time">Время начала:</label>
                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" required>
                @error('start_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_time">Время окончания:</label>
                <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" required>
                @error('end_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Место проведения:</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required>
                @error('location')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="min_participants">Минимальное количество участников:</label>
                <input type="number" class="form-control @error('min_participants') is-invalid @enderror" id="min_participants" name="min_participants" required>
                @error('min_participants')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="max_participants">Максимальное количество участников:</label>
                <input type="number" class="form-control @error('max_participants') is-invalid @enderror" id="max_participants" name="max_participants" required>
                @error('max_participants')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="min_age">Минимальный возраст:</label>
                <input type="number" class="form-control @error('min_age') is-invalid @enderror" id="min_age" name="min_age">
                @error('min_age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="max_age">Максимальный возраст:</label>
                <input type="number" class="form-control @error('max_age') is-invalid @enderror" id="max_age" name="max_age">
                @error('max_age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender_specific">Ограничение по полу:</label>
                <select class="form-control @error('gender_specific') is-invalid @enderror" id="gender_specific" name="gender_specific">
                    <option value="0">Нет ограничения</option>
                    <option value="1">Только для определенного пола</option>
                </select>
                @error('gender_specific')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Создать</button>
            <a href="{{ route('user-events.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
        </form>
    </div>
@endsection
