<?php

use Illuminate\Database\Seeder;
use App\Title;

class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = new Title([
            'area' => 1,
            'title' => 'タイトル: 1'
        ]);
        $title->save();

        $title = new Title([
            'area' => 2,
            'title' => 'タイトル: 2'
        ]);
        $title->save();

        $title = new Title([
            'area' => 3,
            'title' => 'タイトル: 3'
        ]);
        $title->save();
    }
}
