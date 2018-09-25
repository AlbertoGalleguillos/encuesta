<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <title>Encuestas - Webclass</title>
</head>
<body>

<nav class="indigo">
    <div class="container nav-wrapper">
        <a href="/" class="left brand-logo">@yield('title')</a>
        <ul id="nav-mobile" class="right">
            @if (Request::path() != 'old-codes')
                <li><a href="/old-codes">Códigos Antiguos</a></li>
            @endif
        </ul>
    </div>
</nav>
<main>
    <div class="container">
        <br>
        @yield('content')
    </div>
</main>
<footer class="page-footer indigo">
    <div class="container">
        <h5 class="white-text">Sistema de Encuestas</h5>
        <p class="grey-text text-lighten-4"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et magna
            tincidunt, vestibulum eros vel, sodales nibh. Maecenas tristique blandit orci, eget auctor ipsum hendrerit
            in. Integer interdum pellentesque arcu in lobortis. Donec porta metus vel maximus aliquet. Duis ut nulla
            urna. Aenean vel urna est. Aenean eget faucibus odio, vitae commodo orci. Proin blandit vel nisl id mattis.
            Nulla consectetur consequat justo, vel posuere mi efficitur eget. Vivamus varius ex a ultrices finibus.
            Donec blandit ipsum dui, vel egestas lectus facilisis non. </p>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2018 Webclass
            <a class="grey-text text-lighten-4 right" href="#">Descargar Aplicación</a>
        </div>
    </div>
</footer>
@if(Session::has('message'))
    <script>
        var message = @json(Session::get('message'));
    </script>
@endif
<script src="/js/init.js"></script>
</body>
</html>