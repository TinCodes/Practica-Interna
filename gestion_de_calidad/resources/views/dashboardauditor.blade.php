<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Gestión de Control de Calidad - Dashboard</title>
</head>
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
                <a href="/clasificarbanderas" role="button" class="btn btn-secondary btn-block">Pendientes</a>
            </div>

            <div class="col">
                <a href="/banderas" role="button" class="btn btn-secondary btn-block"><i class="fa fa-flag-o"></i></a>
            </div>
        </div>
    </section>

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Gestión de control de calidad</h1>
        </div>
        <div class="row my-10">
            <div id="timeline" class="mx-auto">
                <img src="images/timeline.png" alt="timeline">
            </div>
        </div>

    </section>

    <section id="options" class="container">
        <div class="row my-5">
            <div class="col">
                <a href="/auditorias/create" type="button" class="py-4 btn btn-outline-secondary btn-block">Planificador de Auditorías</a>
            </div>
            <div class="col">
                <a href="/auditorias" role="button" class="py-4 btn btn-outline-secondary btn-block">Auditorías Pendientes/Cerradas</a>
            </div>
            <div class="col">
                <a href="/respjustificaciones" role="button" class="py-4 btn btn-outline-secondary btn-block">Revisar Respuestas</a>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <a href="/cronograma" role="button" class="py-4 btn btn-outline-secondary btn-block">Cronograma</a>
            </div>
            <div class="col">
                <a href="/formjusti" role="button" class="py-4 btn btn-outline-secondary btn-block">Mandar Formulario de Justificaciones</a>
            </div>
        </div>
    </section>

    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>

</html>
