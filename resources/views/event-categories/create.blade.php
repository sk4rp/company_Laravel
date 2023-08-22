@extends('layout')

@section('title', 'Создать категорию мероприятия')

@section('content')
    <div class="container">
        <h1>Создать категорию мероприятия</h1>
        <form method="POST" action="{{ route('event-categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="parent_id">Родительская категория</label>
                <select name="parent_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-2">Создать</button>
            <a href="{{ route('event-categories.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
        </form>
    </div>
@endsection
