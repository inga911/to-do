@extends('layouts.app')

@section('content')
    <h1>Create new ToDo</h1>
    <div class="main-create-window-container">
        <div class="main-card card ">
            <form action="{{ route('todo-store') }}" method="POST" class="main-form">
                @csrf
                <div class="mb-3 input">
                    <label class="form-label form-input">ToDo title</label>
                    <input type="text" class="form-control form-input @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 input">
                    <label class="form-label">ToDo notes</label>
                    <div class="mb-3">
                        <textarea name="notes" id="" placeholder="Add notes" oninput="countCharacters(this)" maxlength="300"
                            class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>
                        <small id="characterCount"></small>
                        @error('notes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 input">
                    <label class="form-label">Due date</label>
                    <input type="date" class="form-control date @error('end') is-invalid @enderror" name="end"
                        value="{{ old('end') }}">
                    @error('end')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 input">
                    <label class="form-label">Due time</label>
                    <input type="time" class="form-control date @error('duetime') is-invalid @enderror" name="duetime"
                        value="{{ old('duetime') }}">
                    @error('duetime')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="start">
                <button type="submit" class="btn">Submit</button>
            </form>
            <a href="{{ route('todo-index') }}" class="goback">Go back to list</a>
        </div>
    </div>
    <script>
        function countCharacters(input) {
            const maxLength = input.getAttribute("maxlength");
            const currentLength = input.value.length;
            const remaining = maxLength - currentLength;
            const characterCount = document.getElementById("characterCount");
            characterCount.textContent = `${remaining} characters left`;
        }
    </script>
@endsection
