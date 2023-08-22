@extends('layout')

@section('title', 'Категории событий')

@section('content')
    <div class="container">
        <h1>Категории мероприятий</h1>
        <a href="{{ route('event-categories.create') }}" class="btn btn-primary mb-2">Создать категорию</a>
        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Родительская категория</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                @if ($category->parent_id !== null)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent ? $category->parent->name : 'Родительская категория' }}</td>
                        <td>
                            <a href="{{ route('event-categories.show', $category->id) }}" class="btn btn-info btn-sm">Просмотр</a>
                            <a href="{{ route('event-categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('event-categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('event-categories.create-parent') }}" class="btn btn-success mb-2">Создать родительскую категорию</a>
        <a href="{{ route('event-categories.delete-parent')}}" class="btn btn-danger mb-2">Удалить родительскую категорию</a>
    </div>
@endsection
