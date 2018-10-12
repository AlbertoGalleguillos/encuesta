<?php

namespace App\Http\Controllers;

use App\WebclassQuestion;
use Illuminate\Http\Request;

class WebclassQuestionController extends Controller
{
    public function store(Request $request)
    {
        WebclassQuestion::create([
            'data' => $request->input('data')
        ]);

        return rand(100000, 999999);
    }
}
