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
            <h1>Clasificación de banderas</h1>
        </div>
        
    </section>

    <section id="options" class="d-flex justify-content-center">
    <form action="" method="post">
        <select id='banderas' multiple='multiple'>
            <option value='elem_1' selected>elem 1</option>
            <option value='elem_2'>elem 2</option>
            <option value='elem_3'>elem 3</option>
            <option value='elem_4' selected>elem 4</option>
            <option value='elem_100'>elem 100</option>
        </select>
        <div class="text-center mt-4">
            <button type="submit" id="sendClas" name="sendClas" class="btn btn-secondary"> Terminado </button>
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