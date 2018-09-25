<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Code;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Charts\ResultChart;

class AnswerController extends Controller
{
    public function create(Request $request)
    {
        if ($request->has(['code', 'alternative'])) {
            $answer = Answer::create([
                'code_id' => $request->code,
                'alternative_id' => $request->alternative
            ]);
        } else {
            return response()->json(['error' => 'Falta ingresar código o alternativa'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if ($answer) {
            return response()->json(['message' => 'Respuesta ingresada con éxito'], Response::HTTP_OK);
        } else {
            return response()->json(['error' => 'Error, comuníquese con soporte'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(Code $code)
    {
        $total = [];
        foreach ($code->question->alternatives as $alternative) {
            $total[] = ['alternative_id' => $alternative->id, 'total' => $code->answers->where('alternative_id', $alternative->id)->count()];
        }
        return $total;
    }

    public function index(Code $code)
    {
        $count = [];
        $label = [];
        foreach ($code->question->alternatives as $alternative) {
            $count[] = $code->answers->where('alternative_id', $alternative->id)->count();
            $label[] = $alternative->id;
        }


        $chart = new ResultChart();
        $chart->labels($label);
        $chart->dataset('Result', 'bar', $count)->options(['color' => '#ff0000']);
        $chart->options(['color' => '#ff0000']);

        return view('result.index', compact('chart','total', 'code'));
    }
}
