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
            <h1>Gestión</h1>
        </div>
    </section>

    <div class="container col-sm-4 col-md-7 col-lg-4 mt-5">
        <div class="card">
            <h3 class="card-header" id="monthAndYear"></h3>
            <table class="table table-bordered table-responsive-sm" id="calendar">
                <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
                </thead>

                <tbody id="calendar-body">

                </tbody>
            </table>

            <div class="form-inline">
                <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="prev()">Previous</button>
                <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
            </div>
            <br/>
            <form class="form-inline">
                <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                    <option value=0>Jan</option>
                    <option value=1>Feb</option>
                    <option value=2>Mar</option>
                    <option value=3>Apr</option>
                    <option value=4>May</option>
                    <option value=5>Jun</option>
                    <option value=6>Jul</option>
                    <option value=7>Aug</option>
                    <option value=8>Sep</option>
                    <option value=9>Oct</option>
                    <option value=10>Nov</option>
                    <option value=11>Dec</option>
                </select>


                <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                    <option value=1990>1990</option>
                    <option value=1991>1991</option>
                    <option value=1992>1992</option>
                    <option value=1993>1993</option>
                    <option value=1994>1994</option>
                    <option value=1995>1995</option>
                    <option value=1996>1996</option>
                    <option value=1997>1997</option>
                    <option value=1998>1998</option>
                    <option value=1999>1999</option>
                    <option value=2000>2000</option>
                    <option value=2001>2001</option>
                    <option value=2002>2002</option>
                    <option value=2003>2003</option>
                    <option value=2004>2004</option>
                    <option value=2005>2005</option>
                    <option value=2006>2006</option>
                    <option value=2007>2007</option>
                    <option value=2008>2008</option>
                    <option value=2009>2009</option>
                    <option value=2010>2010</option>
                    <option value=2011>2011</option>
                    <option value=2012>2012</option>
                    <option value=2013>2013</option>
                    <option value=2014>2014</option>
                    <option value=2015>2015</option>
                    <option value=2016>2016</option>
                    <option value=2017>2017</option>
                    <option value=2018>2018</option>
                    <option value=2019>2019</option>
                    <option value=2020>2020</option>
                    <option value=2021>2021</option>
                    <option value=2022>2022</option>
                    <option value=2023>2023</option>
                    <option value=2024>2024</option>
                    <option value=2025>2025</option>
                    <option value=2026>2026</option>
                    <option value=2027>2027</option>
                    <option value=2028>2028</option>
                    <option value=2029>2029</option>
                    <option value=2030>2030</option>
                </select></form>
        </div>
    </div>
    <div class="container p-5">
    <form method="post" action="/auditorias">
        @csrf
        <div class="form-row">
            <div class="col">
            <label for="nombre">Nombre de la auditoría:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de auditoria" value="{{old('nombre')}}" required>
            @error('nombre') <p class="valError"> {{ $message }} </p> @enderror
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="fecha">Fecha: </label>
            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="{{old('fecha')}}" required>
            @error('fecha') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-6 mb-3">
            <label for="pdc">Persona de contacto: </label>
            <input type="text" class="form-control" id="pdc" name="pdc" placeholder="Persona de contacto" value="{{old('pdc')}}" required>
            @error('pdc') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="macroproceso">Macroproceso: </label>
            <input type="text" class="form-control" id="macroproceso" name="macroproceso" placeholder="Macroproceso" value="{{old('macroproceso')}}" required>
            @error('macroproceso') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-6 mb-3">
            <label for="proceso">Proceso: </label>
            <input type="text" class="form-control" id="proceso" name="proceso" placeholder="Proceso" value="{{old('proceso')}}" required>
            @error('proceso') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="auditor">Auditor: </label>
            <input type="text" class="form-control" id="auditor" name="auditor" placeholder="Auditor" value="{{old('auditor')}}" required>
            @error('auditor') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-6 mb-3">
            <label for="elem_calidad">Elemento de calidad: </label>
            <select class="form-control" id="elem_calidad" name="elem_calidad" required>
                <option value="">Elemento de Calidad</option>
                @foreach($elems as $elem)
                    <option value="{{ $elem->id_elem_calidad }}">{{ $elem->nombre }}</option>
                @endforeach
            </select>
            @error('elem_calidad') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>
        <div class="text-center mt-4">
            <input type="submit" id="sendresponse" value="Submit" class="btn btn-secondary"> Terminado </input>
        </div>
    </form>
</div>
    <footer>

    </footer>
</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
<script src="/js/calendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
</html>
