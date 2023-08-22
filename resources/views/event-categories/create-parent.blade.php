@extends('layout')

@section('title', 'Создать родительскую категорию')

@section('content')
    <div class="container">
        <h1>Создать родительскую категорию</h1>
        <form method="POST" action="{{ route('event-categories.store-parent') }}">
            @csrf
            <div class="form-group">
                <label for="name">Название родительской категории</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Создать</button>
            <a href="{{ route('event-categories.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
        </form>
    </div>
@endsection
