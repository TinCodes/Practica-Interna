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
    <section id="timeline_section" class="container pb-3">
        <div class="row my-5">
            <h1>Auditorias</h1>
        </div>
        <a href="/auditorias?estado=Pendiente" class="btn btn-login" role="button">Pendientes</a>
        <a href="/auditorias?estado=Bandera" class="btn btn-login" role="button">Banderas</a>
        <a href="/auditorias?estado=Cerrada" class="btn btn-login" role="button">Cerradas</a>
    </section>
    <div class="container-fluid">
		<div class="container">
			<div class="formBox">
                <form>
                    @forelse($auditorias as $auditoria)
                    <div class="row">
                        <div class="col-sm-6">
                            <strong><p> {{ $auditoria->nombre }} </p></strong> {{ $auditoria->fecha }}
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-login" href="/auditorias/{{ $auditoria->id }}" role="button">Revisar Auditoria</a>
                        </div>
                    </div>
                    @empty
                        <p>Sin auditorias que mostrar</p>
                    @endforelse

                    <div class="text-center mt-4">
                        <a href="/dashboardauditor" role="button"  id="sendresponse" class="btn btn-secondary"> Volver </a>
                    </div>
                </form>
            </div>
		</div>
    </div>


    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>

</html>
