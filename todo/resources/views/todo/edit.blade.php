@extends('layouts.app')

@section('content')


<div class="main-card card">
    <p><i>Now you're editing <b>{{$todo->title}}</b></i></p>
<form action="{{ route('todo-update', $todo) }}" method="post" class="main-form">
        <div class="mb-3 input">
          <label class="form-label">ToDo title</label>
          <input type="text" class="form-control" name="title"  value="{{ old('title', $todo->title) }}">
      </div>
      <div class="mb-3 input">
          <label class="form-label">ToDo notes</label>
          <textarea name="notes" maxlength="300" >{{ old('notes', $todo->notes) }}</textarea>
      </div>
      <div class="mb-3 input">
          <label class="form-label">Set new Due date</label>
          <input type="date" class="form-control" name="end" value="{{ old('end', $todo->end->format('Y-m-d')) }}">
      </div>
      <div class="mb-3 input">
          <label class="form-label">Set new Due time</label>
          <input type="time" class="form-control" name="duetime" value="{{ old('duetime', $todo->duetime->format('H:i')) }}" >
      </div>
      <input type="hidden" name="start">
      <button type="submit" class="btn btn-primary">Submit</button>
      @csrf
      @method('put')
  </form>
  <a href="{{ route('todo-index') }}" class="goback">Go back to list</a>
</div>
@endsection