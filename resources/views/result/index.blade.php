@extends('layouts.master')

@section('title')
    Resultados
@endsection

@section('content')
    <div style="height: 400px">
        {!! $chart->container() !!}
    </div>
    <br>
    <div class="center">
        <a href="/" class="waves-effect waves-light btn indigo"><i class="material-icons left">arrow_back_ios</i>Volver</a>
    </div>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endsection