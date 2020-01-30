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
            <h1>Banderas</h1>
        </div>
    </section>

    <div class="container">
        <form action="/search" method="POST" class="form-inline mr-auto">
            @csrf
            <div class="col-xs-4">
                <input class="form-control" id="search" name="search" type="text" placeholder="Buscar..">
            </div>
            <button type="submit" id="go" name="go" class="btn btn-primary btn-login">Buscar</button>
        </form>
        <br>
        <a href="/banderas?by=Todas" class="btn btn-login">Todas</a>
        <a href="/banderas?by=Banderas" class="btn btn-login">Banderas</a>
        <a href="/banderas?by=Observaciones" class="btn btn-login">Observaciones</a>
        <a href="/banderas?by=No Conformidades" class="btn btn-login">No Conformidades</a>
        <a href="/banderas?by=Pendientes" class="btn btn-login">Pendientes</a>
        <a href="/banderas?by=Cerradas" class="btn btn-login">Cerradas</a>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre Actividad</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Auditor</th>
                <th>Macroproceso</th>
                <th>Descripción</th>
                <th>Persona de Contacto</th>
                <th>Elem de Calidad</th>
                <th>Link</th>
            </tr>
            </thead>
            <tbody id="myTable">
                @forelse($actividades as $actividad)
                    @foreach($elems as $elem)
                        <tr>
                            <th>{{ $actividad->nombre }}</th>
                            <th>{{ $actividad->fecha }}</th>
                            <th>{{ $actividad->hora }}:{{ $actividad->minuto }}</th>
                            <th>{{ $elem->estado }}</th>
                            <th>{{ $actividad->auditor }}</th>
                            <th>{{ $actividad->macroproceso }}</th>
                            <th>{{ $elem->descripcion }}</th>
                            <th>{{ $actividad->pdc }}</th>
                            <th>{{ $elem->nombre }}</th>
                            <th><a href="/modbanderas/{{$actividad->id}}/{{$elem->id}}/edit">Revisar</a></th>
                        </tr>
                    @endforeach
                @empty
                    <tr><p class="mt-3">Sin banderas que mostrar</p></tr>
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
    // Get the input field
    var input = document.getElementById("search");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("go").click();
        }
    });

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
