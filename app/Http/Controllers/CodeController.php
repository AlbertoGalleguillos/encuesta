<?php

namespace App\Http\Controllers;

use App\Code;
use App\Question;
use App\Test;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CodeController extends Controller
{
    public function create(Test $test)
    {
        $number = rand(100000, 999999);
        //TODO: validate not repeat code
        $code = Code::create([
            "user_id" => 1,
            "test_id" => $test->id,
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
        $code = Code::with('test.questions.alternatives')->where([
            ['number', $number],
            ['valid_until', '>', now()]
        ])->first();

        if ($code != null) {
            return $code;
        } else {
            return response()->json(['error' => 'Código no válido'], Response::HTTP_NOT_FOUND);
        }
    }

    public function old()
    {
        $codes = Code::withCount('answers')
            ->where('user_id', 1)
            ->orderBy('id', 'desc')->paginate(20);
            //->get();
        //$codes = 1;
        return view('code.old', compact('codes'));
    }
}
