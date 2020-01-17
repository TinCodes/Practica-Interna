<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title> Gestión de Control de Calidad </title>
</head>
<body>
    <header>
        <div id="banner" class="row">
            <div id="banner_img" class="mx-auto">
                <img src="/img/logo.jpg" alt="Logo UPB">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <div id="logintitle">
                            <img src="/img/user.jpg" id="icon" alt="User Icon" />
                            <h1> Sisgesca </h1>
                        </div>
                       
                        <form action="" autocomplete="off">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user" placeholder="Usuario"> 
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            </div>
                            <button type="button" id="sendlogin" class="btn btn-login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>

</html>