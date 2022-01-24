<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Task;

class TaskController extends Controller
{
    public function getData(Request $request) {
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }

    public function addList(Request $request) {
        $tasks = new Task;
        $tasks->title_id = $request->title_id;
        $tasks->task = "";
        $tasks->save();
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }

    public function deleteTask(Request $request) {
        $tasks = Task::where('id', $request->id)->delete();
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }
}
