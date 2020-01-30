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
                <a href="/elegirbanderas" role="button" class="btn btn-secondary btn-block">Clasificación</a>
            </div>

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
            <h1>Clasificación de banderas</h1>
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
            <div class="col-md-12 mb-3">
                <p><strong>Auditor: </strong></p>
                <p> {{ $actividad->auditor }} </p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                <p><strong>Descripción: </strong></p>
                <p>{{ $actividad->descripcion }}</p>
            </div>
        </div>
    </div>

    <section id="options" class="d-flex justify-content-center">
        <form action="/modbanderas/{{ $actividad->id }}/{{ $elem->id }}" method="post">
            @csrf
            @method('PATCH')
            <div class="col-md-6 mb-3">
                <p><strong>Elemento de calidad: </strong></p>
                    <div class="col">{{ $elem->nombre }}</div>
                    <div class="col">
                        <label class="radio-inline ml-2">
                            @if(!strcmp($elem->estado, "Cumple"))
                                <input type="radio" name="estado" value="Cumple"  checked>Cumple
                            @else
                                <input type="radio" name="estado" value="Cumple" >Cumple
                            @endif
                        </label>
                        <label class="radio-inline ml-2">
                            @if(!strcmp($elem->estado, "Pendiente"))
                                <input type="radio" name="estado" value="Pendiente"  checked>Pendiente
                            @else
                                <input type="radio" name="estado" value="Pendiente" >Pendiente
                            @endif
                        </label>
                        <label class="radio-inline ml-2">
                            @if(!strcmp($elem->estado, "No Conformidad"))
                                <input type="radio" name="estado" value="No Conformidad" >No checked Conformidad
                            @else
                                <input type="radio" name="estado" value="No Conformidad" >No Conformidad
                            @endif
                        </label>
                        <label class="radio-inline ml-2">
                            @if(!strcmp($elem->estado, "Observacion"))
                                <input type="radio" name="estado" value="Observacion"  checked>Observación
                            @else
                                <input type="radio" name="estado" value="Observacion" >Observación
                            @endif
                        </label>
                        <label class="radio-inline ml-2">
                            @if(!strcmp($elem->estado, "Recomendacion"))
                                <input type="radio" name="estado" value="Recomendacion" checked>Recomendación
                            @else
                                <input type="radio" name="estado" value="Recomendacion">Recomendación
                            @endif
                        </label>
                        <label class="radio-inline ml-2">
                            @if(!strcmp($elem->estado, "Cerrada"))
                                <input type="radio" name="estado" value="Cerrada" checked>Cerrada
                            @else
                                <input type="radio" name="estado" value="Cerrada">Cerrada
                            @endif
                        </label>
                    </div>
                    <div class="col"><input type="text" class="form-control" id="anotaciones"
                                            name="desc" placeholder="Anotaciones"></div>
                    <div class="w-100"></div>
            </div>
            <input type="hidden" name="actividadId" value="{{ $actividad->id }}">
            <div class="text-center mt-4">
                <button type="submit" id="sendClas" name="sendClas" class="btn btn-secondary">Terminado</button>
            </div>
        </form>
    </section>

    <footer>
    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
<script>
$('#banderas').multiSelect({
  selectableHeader: "<div class='custom-header'> <strong> No conformidades </strong></div>",
  selectionHeader: "<div class='custom-header'> <strong> Observaciones </strong></div>"
});
</script>
@endauth
</html>
