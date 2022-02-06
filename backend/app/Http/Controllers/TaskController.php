<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Task;

class TaskController extends Controller
{
    public function getData(Request $request) {
        return Title::select('id','area','title')->where('id', 1)->with('tasks:id,title_id,task,comment')->get();
        // return $titles->with('tasks:id,title_id,task,comment')->get();
    }

    public function addTextBox(Request $request) {
        $task = new Task;
        $task->title_id = $request->title_id;
        $task->done = false;
        $task->task = "";
        $task->save();
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }

    public function addNewTitle(Request $request) {
        $title = Title::find($request->id);
        $title->title = $request->title;
        $title->save();
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }


    public function addNewTask(Request $request) {
        $task = Task::find($request->id);
        $task->task = $request->task;
        $task->save();
        return Task::where('id',$request->id)->get();
        // $titles = Title::select('id','area','title');
        // return $titles->with('tasks:id,title_id,task')->get();
    }


    public function deleteTask(Request $request) {
        $tasks = Task::where('id', $request->id)->delete();
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }

    public function allDelete(Request $request) {
        $titles = Title::where('id', $request->id)->delete();
        $titles = Title::select('id','area','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }
}
