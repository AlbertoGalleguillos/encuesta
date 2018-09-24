@extends('layouts.master')

@section('title')
    Crear encuesta
@endsection

@section('content')
    <div class="card-panel">
        <form>
            <div class="input-field">
                <i class="material-icons prefix">title</i>
                <input name="title" id="title" type="text" class="validate">
                <label for="title">Título</label>
            </div>
            <div class="file-field input-field">
                <div class="btn indigo">
                    <span>Imagen</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11">
                    <i class="material-icons prefix">filter_1</i>
                    <input name="title" id="title" type="text" class="validate">
                    <label for="title">Alternativa #1</label>
                </div>
                <div class="col s1 right-align">
                    <a class="btn-floating btn-large tooltipped indigo" data-position="left" data-tooltip="Agregar alternativa"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="center">
                <button class="btn waves-effect waves-light indigo" type="submit" name="action">Guardar
                    <i class="material-icons right">save</i>
                </button>
            </div>
        </form>
    </div>
@endsection