@extends('layouts.app')

@section('content')
    <h1 class="greeting">Welcome back, {{ Auth::user()->name }}!</h1>
    <div class="container home-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="{{ route('todo-create') }}">Add new todo</a>
                </div>
                <div class="card">
                    <a href="{{ route('todo-index') }}">See your all todo</a>
                </div>
            </div>
        </div>
    </div>
@endsection
