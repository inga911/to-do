<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todo.index', [
            'todos' => $todos
        ]);
    }

    public function create()
    {
        $todos = Todo::all();
        return view('todo.create', [
            'todos' => $todos
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100',
            'notes' => 'required|min:10|max:300',
            'end' => 'required|date',
            'duetime' => 'required|date_format:H:i',
        ], [
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least :min characters.',
            'title.max' => 'The title may not be greater than :max characters.',
            'notes.required' => 'The notes field is required.',
            'notes.min' => 'The notes must be at least :min characters.',
            'notes.max' => 'The notes may not be greater than :max characters.',
            'end.required' => 'The due date field is required.',
            'duetime.required' => 'The due time field is required.',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->notes = $request->notes;
        $todo->end = Carbon::createFromFormat('Y-m-d', $request->input('end'));
        $todo->duetime = Carbon::createFromFormat('H:i', $request->input('duetime'));

        $todo->save();
        return redirect()
            ->route('todo-index')
            ->with('ok', 'New task was added');
    }


    public function show(Todo $todo)
    {
        return view('todo.show', [
            'todo' => $todo,
        ]);
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', [
            'todo' => $todo
        ]);
    }


    public function update(Request $request, Todo $todo)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100',
            'notes' => 'required|min:10|max:300',
            'end' => 'required|date',
            'duetime' => 'required|date_format:H:i',
        ], [
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least :min characters.',
            'title.max' => 'The title may not be greater than :max characters.',
            'notes.required' => 'The notes field is required.',
            'notes.min' => 'The notes must be at least :min characters.',
            'notes.max' => 'The notes may not be greater than :max characters.',
            'end.required' => 'The due date field is required.',
            'duetime.required' => 'The due time field is required.',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [];

        if ($request->has('title')) {
            $data['title'] = $request->title;
        }

        if ($request->has('notes')) {
            $data['notes'] = $request->notes;
        }

        if ($request->has('end')) {
            $data['end'] = Carbon::createFromFormat('Y-m-d', $request->input('end'));
        }

        if ($request->has('duetime')) {
            $data['duetime'] = Carbon::createFromFormat('H:i', $request->input('duetime'));
        }

        $todo->update($data);

        return redirect()
            ->route('todo-index')
            ->with('info', $todo->title . ' was updated');;
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()
            ->route('todo-index')
            ->with('info', $todo->title . ' was deleted');
    }
}
