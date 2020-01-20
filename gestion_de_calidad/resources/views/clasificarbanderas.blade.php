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
            <h1>Clasificación de banderas</h1>
        </div>

    </section>

    <section id="options" class="d-flex justify-content-center">
    <form action="/clasificarbanderas" method="post">
        @csrf
        @if(!empty($auditorias))
        <select id='banderas' multiple='multiple' name="selected[]">
            @foreach($auditorias as $auditoria)
                @if( strcmp($auditoria->tipo, "Observacion") )
                    <option value='{{$auditoria->id}}'>{{$auditoria->nombre}}</option>
                @else
                    <option value='{{$auditoria->id}}' selected>{{$auditoria->nombre}}</option>
                @endif
            @endforeach
        </select>
        @else
            <p>Sin auditorias que mostrar</p>
        @endif
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
</html>
