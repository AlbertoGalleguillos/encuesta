<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function alternatives()
    {
        return $this->hasMany('App\QuestionAlternative');
    }

}
