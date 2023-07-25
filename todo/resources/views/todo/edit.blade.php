@extends('layouts.app')

@section('content')
    <div class="main-edit-window-container">
        <div class="main-card card">
            <p><i>Now you're editing <b>{{ $todo->title }}</b></i></p>
            <form action="{{ route('todo-update', $todo) }}" method="post" class="main-form">
                @csrf
                @method('put')
                <div class="mb-3 input">
                    <label class="form-label">ToDo title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title', $todo->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 input">
                    <label class="form-label">ToDo notes</label>
                    <textarea name="notes" maxlength="300" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $todo->notes) }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 input">
                    <label class="form-label">Set new Due date</label>
                    <input type="date" class="form-control @error('end') is-invalid @enderror" name="end"
                        value="{{ old('end', $todo->end->format('Y-m-d')) }}">
                    @error('end')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 input">
                    <label class="form-label">Set new Due time</label>
                    <input type="time" class="form-control @error('duetime') is-invalid @enderror" name="duetime"
                        value="{{ old('duetime', $todo->duetime->format('H:i')) }}">
                    @error('duetime')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="start">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="{{ route('todo-index') }}" class="goback">Go back to list</a>
        </div>
    </div>
@endsection
