<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task')
    }
}
