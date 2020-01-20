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

    <section id="timeline_section" class="container">
        <div class="row my-5">
            <h1>Estado de respuestas</h1>
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
                            <strong><p class="text-success"> Aprobado </p></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <strong><p> Ejemplo 2 </p></strong>
                        </div>

                        <div class="col-sm-6">
                            <strong><p class="text-danger"> Rechazado </p></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <strong><p> Ejemplo 3 </p></strong>
                        </div>

                        <div class="col-sm-6">
                            <strong><p> Pendiente </p></strong>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="/dashboardjc" role="button" id="sendresponse" class="btn btn-secondary"> Volver </a>
                    </div>
                </form>
            </div>
		</div>
    </div>
    

    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
@endauth
</html>