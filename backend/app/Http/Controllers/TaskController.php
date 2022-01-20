<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Task;

class TaskController extends Controller
{
    public function getData(Request $request) {
        $titles = Title::select('id','title');
        return $titles->with('tasks:id,title_id,task')->get();
    }
}
