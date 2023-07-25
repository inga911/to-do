@extends('layouts.app')

@section('content')
    <div class="main-window-container">
        <div class="show-card card" style="">
            <h3 class="title">{{ $todo->title }}</h3>
            <p class="col-md-8"> {{ $todo->notes }} </p>
            <div>Was created at: {{ $todo->start->format('d/m/Y') }}</div>
            <div>Due date: {{ $todo->end->format('d/m/Y') }}</div>
            <div>Due time: {{ $todo->duetime->format('H:i') }}</div>
            <div class="buttons">
                <a href="{{ route('todo-edit', $todo->id) }}" class="btn-edit">Edit</a>
                <form action="{{ route('todo-delete', $todo) }}" method="post">
                    <button type="submit" class="btn-delete">Delete</button>
                    @csrf
                    @method('delete')
                </form>
            </div>
            <a href="{{ route('todo-index') }}" class="goback">Go back to list</a>
        </div>
    </div>
@endsection
