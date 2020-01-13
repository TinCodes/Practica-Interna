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
            <h1>Justificación de auditoria</h1>
        </div>

        
        <form>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary ">Action</button>
                <button type="button" class="btn btn-secondary  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
            
            <fieldset class="border p-4">
                <legend  class="w-auto"> Descripción del problema </legend>
                <textarea class="form-control" id="planAccion" rows="3"></textarea>
            </fieldset>
            <div class="text-center mt-md-5">
            
                <button type="button" id="sendresponse" class="btn btn-login mb-md-5"> Enviar </button>
            </div>
        </form>
    </section>
    <footer>
        
    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>

</html>