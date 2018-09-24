<?php

namespace App\Http\Controllers;

use App\Code;
use App\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CodeController extends Controller
{
    public function create(Question $question)
    {
        $number = rand(100000, 999999);
        $code = Code::create([
            "user_id" => 1,
            "question_id" => $question->id,
            "number" => $number,
            "valid_until" => now()->addDay(),
        ]);
        return view('code.new', compact('code'));
    }

    public function disable(Request $request, Code $code)
    {
        $code->valid_until = now();
        if ($code->save()) {
            $request->session()->flash('message', 'Código deshabilitado con éxito');
        } else {
            $request->session()->flash('message', 'Error, comuníquese con soporte');
        }
        return back();
    }

    public function show($number)
    {
        $code = Code::where([
            ['number', $number],
            ['valid_until', '>', now()]
        ])->first();

        if ($code != null) {
            return ['code' => $code,  'question' => Question::with('alternatives')->find($code->question_id)];
        } else {
            return response()->json(['error' => 'Código no válido'], Response::HTTP_NOT_FOUND);
        }
    }
}
