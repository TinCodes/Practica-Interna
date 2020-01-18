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

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Auditorias pendientes</h1>
        </div>
    </section>
    <div class="container-fluid">
		<div class="container">
			<div class="formBox">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong><p> Ejemplo 1 </p></strong>
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-login" href="#" role="button">Revisar Auditoria</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <strong><p> Ejemplo 2 </p></strong>
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-login" href="#" role="button">Revisar Auditoria</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <strong><p> Ejemplo 3 </p></strong>
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-login" href="#" role="button">Revisar Auditoria</a>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Auditorias realizadas</h1>
        </div>
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
                            <a class="btn btn-login" href="#" role="button">Revisar Auditoria</a>
                        </div>
                    </div>
                    @empty
                        <p>Sin auditorias que mostrar</p>
                    @endforelse

                    <div class="text-center mt-4">
                        <button type="button" id="sendresponse" class="btn btn-secondary"> Volver </button>
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
