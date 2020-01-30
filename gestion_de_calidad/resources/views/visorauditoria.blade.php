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
                <a href="/dashboard" role="button" class="btn btn-secondary btn-block">Dashboard</a>
            </div>
        </div>
    </section>

    <div class="container p-5">
        <div class="form-row">
            <div class="col-md-6">
                <p><strong>Nombre de la actividad:</strong></p>
                <p> {{ $actividad->nombre }} </p>
            </div>
            <div class="col-md-6">
                <p><strong>Persona auditada:</strong></p>
                <p> {{ $actividad->persona }} </p>
            </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <p><strong>Fecha:</strong></p>
            <p> {{ $actividad->fecha }} </p>
        </div>
        <div class="col-md-3 mb-3">
            <p><strong>Hora:</strong></p>
            <p> {{ $actividad->hora }}:{{ $actividad->minuto }} </p>
        </div>
        <div class="col-md-6 mb-3">
            <p><strong>Persona de contacto: </strong></p>
            <p> {{ $actividad->pdc }} </p>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <p><strong>Macroproceso: </strong></p>
            <p> {{ $actividad->macroproceso }} </p>
        </div>
        <div class="col-md-6 mb-3">
            <p><strong>Estado: </strong></p>
            <p> {{ $actividad->estado }} </p>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <p><strong>Auditor: </strong></p>
            <p> {{ $actividad->auditor }} </p>
        </div>
        <div class="col-md-6 mb-3">
            <p><strong>Elemento de calidad: </strong></p>
            @foreach($elems as $elem)
                <div>{{ $elem->nombre }}</div>
            @endforeach
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12">
            <p><strong>Descripción: </strong></p>
            <p>{{ $actividad->descripcion }}</p>
        </div>
    </div>
    <div class="text-center mt-4">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Eliminar</button>
        <a href="/actividades/{{ $actividad->id }}/edit" type="button" id="edit" class="btn btn-secondary"> Editar </a>
        <a href="/actividades" type="button" id="sendresponse" class="btn btn-secondary"> Listo </a>
    </div>
</div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar auditoria</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Desea eliminar permanentemente la auditoría?</p>
                    <form action="/actividades/{{ $actividad->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-login mb-3">Borrar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
<script src="/js/calendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
@endauth
</html>
