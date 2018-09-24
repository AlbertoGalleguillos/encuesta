@extends('layouts.master')

@section('title')
    Nuevo Código
@endsection

@section('content')
    <h1 class="center-align">
        Ingresar código: <br><br><br><span style="font-size: 20vw">{{ $code->number }}</span>
    </h1>
    <br>
    <br>
    <br>
    <div class="center row">
        <div class="col s6">
            <a href="/" class="waves-effect waves-light btn indigo"><i class="material-icons left">arrow_back_ios</i>Volver</a>
        </div>
        <div class="col s6">
            <a href="/result/{{ $code->id }}" class="waves-effect waves-light btn indigo"><i class="material-icons left">bar_chart</i>Resultados</a>
        </div>
    </div>
    <br>
@endsection