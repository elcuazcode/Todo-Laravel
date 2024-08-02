<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class DatabaseTodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('database_index', compact('todos'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'todo' => 'required|max:255',
        ]);

        Todo::create([
            'task' => $request->todo,
        ]);

        return redirect('/database');
    }

    public function delete($id)
    {
        Todo::destroy($id);
        return redirect('/database');
    }

    public function toggle($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return redirect('/database');
    }
}