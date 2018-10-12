@extends('layouts.master')

@section('title')
    Resultados
@endsection

@section('content')
    <table>
        <tr>
            <th class="center">Código</th>
            <th class="center">Pregunta</th>
        </tr>
        <tr>
            <td class="center">{{ $code->number }}</td>
            <td class="center">{{ $code->question->title }}</td>
        </tr>
        <tr>
            @include('layouts.image', ['image' => $code->question->image_path, 'colspan' => 2])
        </tr>
        <tr>
            <th colspan="2" class="center">Alternativas</th>
        </tr>
        <tr>
            <th class="center">Id</th>
            <th class="center">Descripción</th>
        </tr>
        @foreach($code->question->alternatives as $alternative)
            <tr>
                <td class="center">{{ $alternative->id }}</td>
                <td class="center">{{ $alternative->body     }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <div id="app" style="height: 400px">
        {!! $chart->container() !!}
    </div>
    <br>
    <div class="center">
        <a href="/" class="waves-effect waves-light btn indigo"><i class="material-icons left">arrow_back_ios</i>Volver</a>
    </div>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>



    {!! $chart->script() !!}
    {!! $chart->id !!}



    <script>
        //TODO: initialize vue
        let id = @json($chart->id)
//            method, setTimeout(this.function, 1000);


export:
        method:
        { readColegios()
            {
                axios.get('/colegios')
                    .then(response => {
                        this.colegios = response.data.colegios.data;

                    });,

            },
          again() {
            setTimeout(this.readSchools, 1000);
            again();
        }
        },
            data(
                colegios: {},
            ),
            computed: {
            again();
        }

            ;

    </script>
@endsection





