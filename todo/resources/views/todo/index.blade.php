@extends('layouts.app')

@section('content')
    <h2>Todo's list</h2>

    <div class="list-container">
        @foreach ($todos as $todo)
            <div class="list">
                <ul>
                    <ol>
                        <div class="buttons">
                            <a href="{{ route('todo-edit', $todo->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('todo-delete', $todo) }}" method="post" class="">
                                <button type="submit" class="btn btn-del">Delete</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                        <div class="line">
                            <a href="{{ route('todo-show', $todo) }}" class="title-link">{{ $todo->title }}</a>
                            <p class="due-date"><i> due date: {{ $todo->end->format('Y/m/d') }}</i></p>
                            <p class="due-date"><i>time:{{ $todo->duetime->format('H:i') }}</i></p>
                            <p class="remaining-time">
                                @php
                                    $currentDateTime = \Carbon\Carbon::now();
                                    $dueDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $todo->end->format('Y-m-d') . ' ' . $todo->duetime->format('H:i'));
                                    $remainingTime = $currentDateTime->diff($dueDateTime);
                                    $remainingTimeString = $remainingTime->format('%d days, %h hours, %i minutes');
                                    $passedTime = $remainingTime->format('%h hours, %i minutes');
                                    $daysPassed = null;
                                    if ($dueDateTime->isPast()) {
                                        $daysPassed = $dueDateTime->diffInDays($currentDateTime);
                                    }
                                @endphp
                                @if ($daysPassed !== null)
                                    <p class="due-date"><i>Due passed: {{ $daysPassed }} days and {{ $passedTime }}
                                            ago</i></p>
                                @else
                                    <p class="due-date"><i> Remaining time: {{ $remainingTimeString }}</i></p>
                                @endif
                            </p>
                            <p class="notes">
                                @if (strlen($todo->notes) > 90)
                                    {{ Str::limit($todo->notes, 90, '...') }}
                                    <a href="{{ route('todo-show', $todo) }}" class="read-more">
                                        Read more</a>
                                @else
                                    {{ $todo->notes }}
                                @endif
                            </p>
                        </div>

                    </ol>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
