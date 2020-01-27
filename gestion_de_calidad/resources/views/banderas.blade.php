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
                <a href="/clasificarbanderas" role="button" class="btn btn-secondary btn-block">Clasificación</a>
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
            <h1>Banderas</h1>
        </div>
    </section>

    <div class="container">
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
        <br>
        <a href="/banderas?by=Todas" class="btn btn-login">Todas</a>
        <a href="/banderas?by=Observaciones" class="btn btn-login">Observaciones</a>
        <a href="/banderas?by=No Conformidades" class="btn btn-login">No Conformidades</a>
        <a href="/banderas?by=Pendientes" class="btn btn-login">Pendientes</a>
        <a href="/banderas?by=Cerradas" class="btn btn-login">Cerradas</a>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Auditor</th>
                <th>Macroproceso</th>
                <th>Proceso</th>
                <th>Contexto</th>
                <th>Persona de Contacto</th>
                <th>Elem de Calidad</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody id="myTable">
                @forelse($auditorias as $auditoria)
                    <tr>
                        <th>{{ $auditoria->nombre }}</th>
                        <th>{{ $auditoria->tipo }}</th>
                        <th>{{ $auditoria->fecha }}</th>
                        <th>{{ $auditoria->id_auditor }}</th>
                        <th>{{ $auditoria->macroproceso }}</th>
                        <th>{{ $auditoria->proceso }}</th>
                        <th>{{ $auditoria->contexto }}</th>
                        <th>{{ $auditoria->pdc }}</th>
                        <th>{{ $auditoria->elem_calidad }}</th>
                        <th>{{ $auditoria->estado }}</th>
                    </tr>
                @empty
                    <tr>Sin auditorias que mostrar</tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endauth
</html>
