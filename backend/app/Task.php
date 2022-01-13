<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function titles()
    {
        return $this->belongsTo('App\Title');
    }
}
