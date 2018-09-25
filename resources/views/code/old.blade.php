@extends('layouts.master')

@section('title')
    Códigos Antiguos
@endsection

@section('content')
    <table>
        <tr>
            <!--<th class="center">#</th>-->
            <th class="center">Código</th>
            <th class="center">Pregunta</th>
            <th class="center">Imagen</th>
            <th class="center">Respuestas</th>
            <th class="center">Válido Hasta</th>
            <th class="center">Acciones</th>
        </tr>
        @forelse($codes as $code)
            <tr>
            <!--<td class="center">{{ $code->id }}</td>-->
                <td class="center">{{ $code->number }}</td>
                <td class="center">{{ $code->question->title }}</td>
                @include('layouts.image', ['image' => $code->question->image_path])
                <td class="center">{{ $code->answers_count }}</td>
                <td class="center">{{ $code->valid_until }}</td>
                <td width="10px" class="center"><a class="tooltipped" data-position="left" data-tooltip="Ver Resultados"
                                                   href="/result/{{ $code->id }}"><i
                                class="material-icons">bar_chart</i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="center">Aún no has creado códigos.</td>
            </tr>
        @endforelse
    </table>

    @include('layouts.pagination', ['object' => $codes])
@endsection