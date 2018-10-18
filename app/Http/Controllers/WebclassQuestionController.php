<?php

namespace App\Http\Controllers;

use App\Code;
use App\Question;
use App\Test;
use App\WebclassQuestion;
use Illuminate\Http\Request;

class WebclassQuestionController extends Controller
{
    public function store(Request $request)
    {
        $questionIds = [];
        $wc = WebclassQuestion::create([
            'data' => $request->input('data')
        ]);
        $data = json_decode($wc->data);
        $test = Test::create([
            'wc_id' => $data->prueba->id_prueba,
            'title' => $data->prueba->titulo_prueba,
        ]);

        foreach ($data->prueba->preguntas as $pregunta) {
            $question = Question::create([
                'wc_id' => $pregunta->id_pregunta,
                'title' => $pregunta->titulo_pregunta,
            ]);
            $questionIds[] = $question->id;
            foreach ($pregunta->alternativas as $alternativa) {
                $question->alternatives()->create([
                    'wc_id' => $alternativa->id_alternativa,
                    'body' => $alternativa->texto_alternativa,
                ]);
            }
        }
        $test->questions()->sync($questionIds);

        do {
            $number = rand(100000, 999999);
        } while (in_array($number, Code::actives(), true));

        $code = Code::create([
            "user_id" => $data->usuario,
            "test_id" => $test->id,
            "number" => $number,
            "valid_until" => now()->addDay(),
        ]);
        return $code->number;
    }
}
