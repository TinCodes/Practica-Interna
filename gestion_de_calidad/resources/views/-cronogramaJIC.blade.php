<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Cronograma</title>
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
                <button type="button" class="btn btn-secondary btn-block">Pendientes</button>
            </div>
            
            <div class="col">
                <button type="button" class="btn btn-secondary btn-block"><i class="fa fa-flag-o"></i></button>
            </div>
        </div>
    </section>

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Gestión</h1>
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
                <button type="button" class="py-4 btn btn-outline-secondary btn-block">Planificador de Auditorías</button>
            </div>
            <div class="col">
                <button type="button" class="py-4 btn btn-outline-secondary btn-block">Auditorías Pendientes/Cerradas</button>
            </div>
            <div class="col">
                <button type="button" class="py-4 btn btn-outline-secondary btn-block">Revisar Respuestas</button>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <button type="button" class="py-4 btn btn-outline-secondary btn-block">Cronograma</button>
            </div>
            <div class="col">
                <button type="button" class="py-4 btn btn-outline-secondary btn-block">Mandar Formulario de Justificaciones</button>
            </div>
        </div>
    </section>

    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>

</html>