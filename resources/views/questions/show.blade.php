@extends('layouts.master')

@section('title')
    Ver Pregunta
@endsection

@section('content')
    <table>
        <tr>
            <th class="center">Pregunta</th>
            <th class="center">Imagen</th>
        </tr>
        <tr>
            <td class="center">{{ $question->title }}</td>
            <td class="center">{{ $question->image != null ? $question->image : '-' }}</td>
        </tr>
        <tr>
            <th colspan="2" class="center">Alternativas</th>
        </tr>
        <tr>
            <th class="center">Id</th>
            <th class="center">Descripción</th>
        </tr>
        @foreach($question->alternatives as $alternative)
            <tr>
                <td class="center">{{ $alternative->id }}</td>
                <td class="center">{{ $alternative->body     }}</td>
            </tr>
        @endforeach
    </table>
@endsection