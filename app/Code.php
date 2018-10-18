<?php

namespace App;

class Code extends Model
{
    public static function getActives()
    {
        return Code::where([
            ['valid_until', '>', now()],
            ['user_id', 1]
        ])->withCount('answers')->get();
    }

    public static function actives()
    {
        return Code::where('valid_until', '>', now())->get()->toArray();
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
