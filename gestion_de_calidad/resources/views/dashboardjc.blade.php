<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Gestión de Control de Calidad</title>
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
                <a href="/banderas" role="button" class="btn btn-secondary btn-block"><i class="fa fa-flag-o"></i></a>
            </div>
        </div>
    </section>

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Gestión de control de calidad</h1>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item active"> BDD 1 </a>
            <a href="#" class="list-group-item"> BDD 2 </a>
            <a href="#" class="list-group-item"> BDD 3 </a>
            <a href="#" class="list-group-item"> BDD 4 </a>
            <a href="#" class="list-group-item"> BDD 5 </a>
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

</html>