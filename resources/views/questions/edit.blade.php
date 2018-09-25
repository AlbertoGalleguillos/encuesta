@extends('layouts.master')

@section('title')
    Editar pregunta
@endsection

@section('content')
    <div class="card-panel">
        <form action="/question/{{ $question->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="input-field">
                <i class="material-icons prefix">title</i>
                <input name="title" id="title" type="text" value="{{ $question->title }}" class="validate">
                <label for="title">Título</label>
            </div>
            <div class="file-field input-field">
                <div class="btn indigo">
                    <span>Imagen</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            @foreach($question->alternatives as $alternative)
                <div class="row">
                    <div class="input-field col s11">
                        <i class="material-icons prefix">filter_{{ $loop->iteration }}</i>
                        <input name="alternatives[{{ $alternative->id }}]" id="title" value="{{ $alternative->body }}"
                               type="text" class="validate">
                        <label for="title">Alternativa #{{ $loop->iteration }}</label>
                    </div>
                    @if ($loop->last)
                        <div class="col s1 right-align">
                            <a class="btn-floating btn-large tooltipped indigo" data-position="left"
                               data-tooltip="Agregar alternativa"><i class="material-icons">add</i></a>
                        </div>
                    @endif
                </div>
            @endforeach
            <div class="center">
                <button class="btn waves-effect waves-light indigo" type="submit" name="action">Guardar
                    <i class="material-icons right">save</i>
                </button>
            </div>
        </form>
    </div>
@endsection