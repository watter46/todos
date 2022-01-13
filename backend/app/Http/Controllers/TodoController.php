<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function get_todos() {
        $todos = Todos::all();
        return $todos;
    }

    public function add_todos(Request $request) {
        $todo = new Todos;
        $todo->task = $request->task;
        $todo->save();
        $todos = Todos::all();
        return $todos;
    }

    public function delete_data(Request $request) {
        $todo = Todos::where('id', $request->id)->delete();
        $todos = Todos::all();
        return $todos;
    }
}
