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
    </section>
    <div class="container">
        <div class="row align-self-center">
        <div class="w-100"></div>
            <div class="col"><h2><strong>Nombre</strong></h2></div>
            <div class="col"><h2><strong>Evaluación</strong></h2></div>
            <div class="col"><h2><strong>Anotaciones</strong></h2></div>
            <div class="w-100"></div>
            <div class="col">Ejemplo 1</div>
            <div class="col">
                <select class="form-control">
                    <option>Cumple</option>
                    <option>Bandera</option>
                    <option>Recomendación</option>
                </select>
            </div>
            <div class="col"><input type="text" class="form-control" id="anotaciones" placeholder="Anotaciones"></div>
            <div class="w-100"></div>
            <div class="col">Ejemplo 2</div>
            <div class="col">
                <select class="form-control">
                    <option>Cumple</option>
                    <option>Bandera</option>
                    <option>Recomendación</option>
                </select>
            </div>
            <div class="col"><input type="text" class="form-control" id="anotaciones" placeholder="Anotaciones"></div>
            <div class="w-100"></div>
            <div class="col">Ejemplo 3</div>
            <div class="col">
                <select class="form-control">
                    <option>Cumple</option>
                    <option>Bandera</option>
                    <option>Recomendación</option>
                </select>
            </div>
            <div class="col"><input type="text" class="form-control" id="anotaciones" placeholder="Anotaciones"></div>
            <div class="w-100"></div>
            <div class="col">Ejemplo 4</div>
            <div class="col">
                <select class="form-control">
                    <option>Cumple</option>
                    <option>Bandera</option>
                    <option>Recomendación</option>
                </select>
            </div>
            <div class="col"><input type="text" class="form-control" id="anotaciones" placeholder="Anotaciones"></div>
        </div>
    </div>
    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>

</html>