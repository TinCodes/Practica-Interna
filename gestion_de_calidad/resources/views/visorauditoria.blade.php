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

    <div class="container p-5">
        <div class="form-row">
            <div class="col">
            <p><strong> Nombre de la auditoría:</strong></p>
            <p> {{ $auditoria->nombre }} </p>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <p><strong> Fecha:</strong></p>
            <p> {{ $auditoria->fecha }} </p>
        </div>
        <div class="col-md-6 mb-3">
            <p><strong>Persona de contacto: </strong></p>
            <p> {{ $auditoria->pdc }} </p>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <p><strong> Macroproceso: </strong></p>
            <p> {{ $auditoria->macroproceso }} </p>
        </div>
        <div class="col-md-6 mb-3">
            <p><strong>Proceso: </strong></p>
            <p> {{ $auditoria->proceso }} </p>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <p><strong>Auditor: </strong></p>
            <p> {{ $auditoria->id_auditor }} </p>
        </div>
        <div class="col-md-6 mb-3">
            <p><strong>Elemento de calidad: </strong></p>
            <p> {{ $auditoria->elem_calidad }} </p>
        </div>
    </div>
    <div class="text-center mt-4">
        <form action="/auditorias/{{ $auditoria->id }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-login mb-3">Borrar</button>
        </form>
        <a href="/auditorias/{{ $auditoria->id }}/edit" type="button" id="edit" class="btn btn-secondary"> Editar </a>
        <a href="/auditorias" type="button" id="sendresponse" class="btn btn-secondary"> Listo </a>
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
</html>
