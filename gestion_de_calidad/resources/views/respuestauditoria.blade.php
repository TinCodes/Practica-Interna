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
@guest
    <header>
        <div id="banner" class="row">
            <div id="banner_img" class="mx-auto">
                <img src="{{ asset('/img/logo.jpg') }}" alt="Logo UPB">
            </div>
        </div>
    </header>
    <body>
        <div class="text-center">
            <h1 class="text-center p-5"> <strong> Acceso denegado </strong> </h1>
            <h2 class="text-center p-3"> Por favor ingrese al sistema</h2>
            <a role="button" href="/" class="btn btn-login"> Login </a>
        </div>
    </body>
@else
<body>
    <header>
        <div id="banner" class="row">
            <div id="banner_img" class="mx-auto">
                <img src="{{ asset('/img/logo.jpg') }}" alt="Logo UPB">
            </div>
        </div>
    </header>

    <section id="right_buttons" class="mx-5 my-3 d-flex justify-content-end">
        <div class="row">
            <div class="col">
                <a href="/banderas" role="button" class="btn btn-secondary btn-block"><i class="fa fa-flag-o"></i></a>
            </div>
            <div class="col">
                <a href="/dashboard" role="button" class="btn btn-secondary btn-block">Dashboard</a>
            </div>
        </div>
    </section>

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Responder actividad observada</h1>
        </div>

        
        <form action="" method="post">
            <fieldset class="border p-4">
                <legend  class="w-auto"> Descripción del problema </legend>
                    <textarea class="form-control" name="descripProblema" id="descripProblema" rows="3"></textarea>
            </fieldset>
            <fieldset class="border p-4">
                <legend  class="w-auto"> Plan de acción </legend>
                    <textarea class="form-control" name="planAccion" id="planAccion" rows="3"></textarea>
            </fieldset>
            <div class="text-center">
            <div class="form-group row mt-md-5">
                <label for="example-date-input" class="col-4 col-form-label"> <strong>Fecha determinada para cumplimiento: </strong></label>
                <div class="col-8">
                    <input class="form-control" type="date" value="YYYY-MM-DD" id="fechaPlan" name="fechaPlan">
                </div>
            </div>
            <div class="text-center mb-4 mt-4">
                <button type="submit" id="sendPlan" name="sendPlan" class="btn btn-login"> Enviar </button>
            </div>
            </div>
        </form>
    </section>
    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
@endauth
</html>