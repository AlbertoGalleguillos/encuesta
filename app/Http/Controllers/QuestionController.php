<?php

namespace App\Http\Controllers;

use App\Code;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $codes = Code::getActives();
        return view('index', compact('questions','codes'));
    }

    public function all()
    {
        return Question::all();
    }

    public function show($id)
    {
        return Question::with('alternatives')->find($id);
    }

    public function create()
    {
        return view('questions.create');
    }
}
