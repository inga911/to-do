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
        ]);
        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->notes = $request->notes;
        $todo->end = Carbon::createFromFormat('Y-m-d', $request->input('end'));
        $todo->duetime = Carbon::createFromFormat('H:i', $request->input('duetime'));

        $todo->save();
        return redirect()
            ->route('todo-index')
            ->with('ok', 'New todo was added');
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

        return redirect()->route('todo-index')->with('ok', $todo->title . ' was updated');;
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()
            ->route('todo-index')
            ->with('info', $todo->title . ' was deleted');
    }
}
