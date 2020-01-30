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
                <img src="/img/logo.jpg" alt="Logo UPB">
            </div>
        </div>
    </header>
    <body>
    <div class="text-center">
        <h1 class="text-center p-5"><strong> Acceso denegado </strong></h1>
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
                <a href="/modbanderas" role="button" class="btn btn-secondary btn-block">Elegir Banderas</a>
            </div>

            <div class="col">
                <a href="/banderas" role="button" class="btn btn-secondary btn-block"><i class="fa fa-flag-o"></i></a>
            </div>
        </div>
    </section>

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Gestión</h1>
        </div>
    </section>
    <div class="container">
        <form action="/modbanderas" method="post">
            <div class="row align-self-center">
                <div class="w-100"></div>
                <div class="col"><h2><strong>Nombre</strong></h2></div>
                <div class="col"><h2><strong>Evaluación</strong></h2></div>
                <div class="col"><h2><strong>Anotaciones</strong></h2></div>
                <div class="w-100"></div>
                @csrf
                @foreach($elems as $elem)
                    <div class="col">{{ $elem->nombre }}</div>
                    <div class="col">
                        <label class="radio-inline ml-2">
                            <input type="radio" name="{{ $elem->id }}" value="Cumple" checked>Cumple
                        </label>
                        <label class="radio-inline ml-2">
                            <input type="radio" name="{{ $elem->id }}" value="Bandera">Bandera
                        </label>
                        <label class="radio-inline ml-2">
                            <input type="radio" name="{{ "$elem->id" }}" value="Recomendacion">Recomendación
                        </label>
                    </div>
                    <div class="col"><input type="text" class="form-control" id="anotaciones"
                                            name="desc{{$elem->id}}" placeholder="Anotaciones"></div>
                    <div class="w-100"></div>
                @endforeach
                <input type="hidden" name="actID" value="{{ $actividad->id }}">
                <div class="text-center mt-4">
                    <button type="submit" id="sendClas" name="sendClas" class="btn btn-secondary">Terminado</button>
                </div>
            </div>
        </form>
    </div>
    <footer>

    </footer>
    </body>

    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
@endauth
</html>
