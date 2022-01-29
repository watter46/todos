<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task([
            'title_id' => 1,
            'done' => false,
            'task' => 'タスク: 1'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 1,
            'done' => false,
            'task' => 'タスク: 2'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 1,
            'done' => false,
            'task' => 'タスク: 3'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 2,
            'done' => false,
            'task' => 'タスク: 4'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 2,
            'done' => false,
            'task' => 'タスク: 5'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 6'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 7'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 8'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 9'
        ]);
        $task->save();
    }
}
