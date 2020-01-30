<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Gestión de Control de Calidad</title>
</head>
@guest
    <header>
        <div id="banner" class="row">
            <div id="banner_img" class="mx-auto">
                <img src="/img/logo.jpg" alt="Logo UPB">
            </div>
        </div>
    </header>
    <body>
        <div class="text-center">
            <h1 class="text-center p-5"> <strong> Acceso denegado </strong> </h1>
            <h2 class="text-center p-3"> Porfavor ingrese al sistema</h2>
            <a role="button" href="/" class="btn btn-login"> Login </a>
        </div>
    </body>
@else
<body>
    <header>
        <div id="banner" class="row">
            <div id="banner_img" class="mx-auto">
                <img src="/img/logo.jpg" alt="Logo UPB">
            </div>
        </div>
    </header>
    
    <section id="right_buttons" class="mx-5 my-3 d-flex justify-content-end">
        <div class="row">
            <div class="col">
                <a href="/banderas" role="button" class="btn btn-secondary btn-block"><i class="fa fa-flag-o"></i></a>
            </div>
            <div class="col">
                <a href="/logout" role="button" class="btn btn-secondary btn-block">Logout</a>
            </div>
        </div>
    </section>

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Gestión de control de calidad</h1>
        </div>
        <div class="list-group">
            @forelse($jcactividades as $actividad)
            <a href="#" class="list-group-item"> {{$actividad->nombre}} </a>
            @empty
                <p> Sin actividades para mostrar </p>
            @endforelse
        </div>
        
    </section>

    <section id="options" class="container">
        <div class="row my-5">
            <div class="col">
                <a href="/auditoriaresp" role="button" class="py-4 btn btn-outline-secondary btn-block">Responder</a>
            </div>
            <div class="col">
                <a href="/estadoresp" role="button" class="py-4 btn btn-outline-secondary btn-block">Estado de respuestas</a>
            </div>
        </div>
    </section>

    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
@endauth
</html>