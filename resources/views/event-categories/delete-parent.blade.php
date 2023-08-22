@extends('layout')

@section('title', 'Удаление родительской категории')

@section('content')
    <div class="container">
        <h1>Удаление родительской категории</h1>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('event-categories.destroy-parent') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="parent_id">Выберите родительскую категорию для удаления:</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger mt-2">Удалить</button>
            <a href="{{ route('event-categories.index') }}" class="btn btn-secondary mt-2">Назад к списку</a>
        </form>
    </div>
@endsection
