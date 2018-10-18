<?php

namespace App;

class Question extends Model
{
    public function alternatives()
    {
        return $this->hasMany('App\QuestionAlternative');
    }

}
