<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/js/app.js') }}">

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
            <h1>Gestión</h1>
        </div>

        
        <form>
            <fieldset class="border p-4">
                <legend  class="w-auto"> Descripción del problema </legend>
                    <textarea class="form-control" id="descripProblema" rows="3"></textarea>
            </fieldset>
            <fieldset class="border p-4">
                <legend  class="w-auto"> Plan de acción </legend>
                    <textarea class="form-control" id="planAccion" rows="3"></textarea>
            </fieldset>
            <div class="text-center">
            <div class="form-group row mt-md-5">
                <label for="example-date-input" class="col-4 col-form-label"> <strong>Fecha determinada para cumplimiento: </strong></label>
                <div class="col-8">
                    <p> Fecha BDD </p>
                </div>
            </div>

            <section id="eval_buttons" class="center-block">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block">Aceptar</button>
                    </div>
            
                    <div class="col">
                        <button type="button" class="btn btn-danger btn-block">Rechazar</button>
                    </div>
                </div>
                <button type="button" id="sendresponse" class="btn btn-login mt-4 mb-4"> Enviar </button>
            </section>
           
            </div>
        </form>
    </section>
    <footer>

    </footer>
</body>
</html>