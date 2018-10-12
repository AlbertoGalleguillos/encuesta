<?php

namespace App;

class Test extends Model
{
    public function questions() {
        return $this->belongsToMany('App\Question');
    }
}
