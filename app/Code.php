<?php

namespace App;

class Code extends Model
{
    public static function getActives()
    {
        return Code::where([
            ['valid_until', '>', now()],
            ['user_id', 1]
        ])->get();
    }

    public function question() {
        return $this->belongsTo('App\Question');
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }
}
