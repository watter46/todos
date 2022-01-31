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
            'task' => 'タスク: 1',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 1,
            'done' => false,
            'task' => 'タスク: 2',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 1,
            'done' => false,
            'task' => 'タスク: 3',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 2,
            'done' => false,
            'task' => 'タスク: 4',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 2,
            'done' => false,
            'task' => 'タスク: 5',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 6',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 7',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 8',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();

        $task = new Task([
            'title_id' => 3,
            'done' => false,
            'task' => 'タスク: 9',
            'comment' => 'コメント: テスト'
        ]);
        $task->save();
    }
}
