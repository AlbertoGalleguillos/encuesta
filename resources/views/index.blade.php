@extends('layouts.master')

@section('title')
    Encuestas
@endsection

@section('content')
    @if(count($questions) > 0)
        <h3>Códigos Activos</h3>
        <table>
            <thead>
            <tr>
                <th>Código</th>
                <th>Pregunta</th>
                <th class="center">Imagen</th>
                <th class="center">Respuestas</th>
                <th class="center">Válido Hasta</th>
                <th colspan="2">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($codes as $code)
                <tr>
                    <td>{{ $code->number }}</td>
                    <td>{{ $code->question->title }}</td>
                    @include('layouts.image', ['image' => $code->question->image_path])
                    <td class="center">{{ $code->answers_count }}</td>
                    <td class="center">{{ $code->valid_until }}</td>
                    <td width="10px"><a class="tooltipped" data-position="left" data-tooltip="Deshabilitar Código"
                                        href="/code/{{ $code->id }}/disable"><i class="material-icons">block</i></a>
                    </td>
                    <td width="10px"><a class="tooltipped" data-position="left" data-tooltip="Ver Resultados"
                                        href="/result/{{ $code->id }}"><i class="material-icons">bar_chart</i></a>
                    </td>
                </tr>
            @empty
                <td colspan="4" class="center">No tienes códigos activos</td>
            @endforelse
            </tbody>
        </table>
        <br>
    @endif

    <h3>Mis preguntas</h3>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Imagen</th>
            <th colspan="3" class="center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->title }}</td>
                @include('layouts.image', ['image' => $question->image_path])
                <td width="10px">
                    <a class="tooltipped" data-position="left" data-tooltip="Generar nuevo código"
                       href="/generate/{{ $question->id }}"><i class="material-icons">touch_app</i></a>
                </td>
                <td width="10px">
                    <a class="tooltipped" data-position="left" data-tooltip="Editar Pregunta"
                       href="/question/{{ $question->id }}/edit"><i class="material-icons">edit</i></a></td>
                <td width="10px">
                    <a class="tooltipped" data-position="left" data-tooltip="Ver Pregunta"
                       href="/question/{{ $question->id }}"><i class="material-icons">visibility</i></a>
                </td>
            </tr>
        @empty
            <td class="center" colspan="6">Aún no tienes preguntas, crea una con el botón verde (Esquina inferior
                derecha)
            </td>
        @endforelse
        </tbody>
    </table>
    <br>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large green tooltipped" data-position="left" data-tooltip="Crear Pregunta"
           href="/create">
            <i class="large material-icons">add</i>
        </a>
    </div>
@endsection