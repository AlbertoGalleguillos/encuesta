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
        if ($request->has('answers', 'code', 'user')) {
            foreach ($request->input('answers') as $answer) {
                $aux = Answer::create([
                    'alternative_id' => $answer['alternative'],
                    'code_id' => $request->input('code'),
                    'question_id' => $answer['question'],
                    'user_id' => $request->input('user'),
                ]);
            }
            return $aux ?? response()->json(['error' => 'Error, comuníquese con soporte'], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['error' => 'Falta ingresar usuario, código o alternativa'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show(Code $code)
    {
        foreach ($code->test->questions as $question) {
            foreach ($question->alternatives as $alternative) {
                $alternative['count'] = $code->answers->where('alternative_id', $alternative->id)->count();
            }
        }
        return $code;
    }

    public function index(Code $code)
    {
        //$count = [];
        $label = [];
        foreach ($code->question->alternatives as $alternative) {
            //$count[] = $code->answers->where('alternative_id', $alternative->id)->count();
            $label[] = $alternative->id;
        }

        $api_url = '/api/result/' . $code->id;

        //$count['color'] = '#ffffff';
        $chart = new ResultChart();
        $chart->labels($label);
        //$chart->dataset('Result', 'bar', $count);
        //$chart->options(['color' => '#ff0000']);
        $chart->load($api_url);

        return view('result.index', compact('chart', 'total', 'code'));
    }

    public function votes(Code $code)
    {
        $count = [];
        //$label = [];
        foreach ($code->question->alternatives as $alternative) {
            $count[] = $code->answers->where('alternative_id', $alternative->id)->count();
            //$label[] = $alternative->id;
        }

        $chart = new ResultChart();
        //$chart->labels($label);
        $chart->dataset('Result', 'bar', $count);

        return $chart->api();
    }

    public function chart(Code $code)
    {
        $count = [];
        $label = [];
        foreach ($code->question->alternatives as $alternative) {
            $count[] = $code->answers->where('alternative_id', $alternative->id)->count();
            $label[] = $alternative->id;
        }

        $chart = new ResultChart();
        $chart->labels($label);
        $chart->dataset('Result', 'bar', $count);

        return $chart->script();
    }
}
