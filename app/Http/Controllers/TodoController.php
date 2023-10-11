<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodoController extends Controller
{
    public function edit(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
}
