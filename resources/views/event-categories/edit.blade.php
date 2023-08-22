@extends('layout')

@section('title', 'Редактировать категорию событий')

@section('content')
    <h1>Редактировать категорию событий</h1>
    <form action="{{ route('event-categories.update', $eventCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $eventCategory->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="parent_id">Родительская категория</label>
            <select name="parent_id" class="form-control">
                <option value="">Выберите родительскую категорию</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $eventCategory->parent_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
    </form>

    <a href="{{ route('event-categories.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
@endsection
