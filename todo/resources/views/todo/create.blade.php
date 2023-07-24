@extends('layouts.app')

@section('content')

<h1>Create new ToDo</h1>
<div class="main-card card ">
    <form action="{{ route('todo-store') }}" method="POST" class="main-form">
      <div class="mb-3 input">
            <label class="form-label form-input">ToDo title</label>
            <input type="text" class="form-control form-input" name="title">
        </div>
        <div class="mb-3 input">
            <label class="form-label">ToDo notes</label>
            <textarea name="notes" id="" placeholder="Add notes" oninput="countCharacters(this)" maxlength="300"></textarea>
            <small id="characterCount"></small>
        </div>
        <div class="mb-3 input">
            <label class="form-label">Due date</label>
            <input type="date" class="form-control date" name="end">
        </div>
        <div class="mb-3 input">
            <label class="form-label">Due time</label>
            <input type="time" class="form-control date" name="duetime">
        </div>
        <input type="hidden" name="start">
        <button type="submit" class="btn">Submit</button>
        @csrf
    </form>
    <a href="{{ route('todo-index') }}" class="goback">Go back to list</a>
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
