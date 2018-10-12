<?php

namespace App\Http\Controllers;

use App\Code;
use App\Question;
use App\QuestionAlternative;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

const IMAGE_PATH = 'public';

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $codes = Code::getActives();
        $tests = Test::all();
        return view('index', compact('questions', 'codes', 'tests'));
    }

    public function all()
    {
        return Question::all();
    }

    public function apiShow($id)
    {
        return Question::with('alternatives')->find($id);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function store(Request $request)
    {
        //TODO: Change user by authenticated user
        $userId = 1;

        //return $request->get('alternatives');

        $question = new Question();
        $question->user_id = $userId;
        $question->title = $request->input('title', 'Sin Título');

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/' . $userId);
            $question->image_path = str_replace('public', '', $image);
        }

        if ($question->save()) {
            $request->session()->flash('message', 'Pregunta guardada correctamente.');
        } else {
            $request->session()->flash('message', 'Error, comuníquese con soporte');
        }

        foreach ($request->get('alternatives') as $alternative) {
            $question->alternatives()->create(['body' => $alternative]);
        }

        return redirect('/');

        //TODO: Save alternatives
    }

    public function update(Request $request, Question $question)
    {
        //TODO: Change user by authenticated user
        $userId = 1;

        $question->title = $request->input('title');
        if ($request->hasFile('image')) {
            if ($question->image_path != null) {
                Storage::delete(IMAGE_PATH . '/' . $question->image_path);
            }

            $image = $request->file('image')->store(IMAGE_PATH . '/' . $userId);
            $question->image_path = str_replace('public', '', $image);
        }
        $question->save();

        foreach ($request->input('alternatives') as $key => $value) {
            $alternative = QuestionAlternative::find($key);
            $alternative->body = $value;
            $alternative->save();
        }

        $request->session()->flash('message', 'Pregunta actualizada correctamente.');
        return redirect('/');
    }
}
