<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <title>Editar actividad</title>
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
    <form method="post" action="/actividades/{{ $actividad->id }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="nombre">Nombre de la auditoría:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de actividad" value="{{ $actividad->nombre }}" required>
                @error('nombre') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="persona">Dirigida a: </label>
                <select class="form-control" id="persona" name="persona" required>
                    @foreach($jdc as $jc)
                        <option value="{{ $jc->id_persona }}">{{ $jc->nombre }}</option>
                    @endforeach
                </select>
                @error('persona') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-1 mb-3">
                <label for="hora">Hora: </label>
                <select class="form-control" id="hora" name="hora" required>
                    <option value="{{ $actividad->hora }}">{{ $actividad->hora }}</option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                </select>
                @error('hora') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-1 mb-3">
                <label for="minuto">Minuto</label>
                <select class="form-control" id="minuto" name="minuto" required>
                    <option value="{{ $actividad->minuto }}" selected>{{ $actividad->minuto }}</option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                    <option value="47">47</option>
                    <option value="48">48</option>
                    <option value="49">49</option>
                    <option value="50">50</option>
                    <option value="51">51</option>
                    <option value="52">52</option>
                    <option value="53">53</option>
                    <option value="54">54</option>
                    <option value="55">55</option>
                    <option value="56">56</option>
                    <option value="57">57</option>
                    <option value="58">58</option>
                    <option value="59">59</option>
                </select>
                @error('minuto') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="fecha">Fecha: (dd-mm-aaaa)</label>
                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="{{ $actividad->fecha }}" required>
                @error('fecha') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="pdc">Persona de contacto: </label>
                <input type="text" class="form-control" id="pdc" name="pdc" placeholder="Persona de contacto" value="{{ $actividad->pdc }}" required>
                @error('pdc') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="macroproceso">Macroproceso: </label>
                <input type="text" class="form-control" id="macroproceso" name="macroproceso" placeholder="Macroproceso" value="{{ $actividad->macroproceso }}" required>
                @error('macroproceso') <p class="valError"> {{ $message }} </p> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="auditor">Auditor: </label>
                <input type="text" class="form-control" id="auditor" name="auditor" placeholder="Auditor" value="{{ $actividad->auditor }}" required>
                @error('auditor') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col mb-3">
                <label for="elem_calidad">Elemento de calidad: </label>
                <select multiple='multiple' class="form-control" id="elem_calidad" name="elem_calidad[]" required>
                    @foreach($elemsAct as $elemAct)
                        <option value="{{ $elemAct->id }}" selected>{{ $elemAct->nombre }}</option>
                    @endforeach
                    @foreach($elems as $elem)
                        <option value="{{ $elem->id }}">{{ $elem->nombre }}</option>
                    @endforeach
                </select>
                @error('elem_calidad') <p class="valError"> {{ $message }} </p> @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion: </label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3">{{ $actividad->descripcion }}</textarea>
        </div>
        <div class="text-center mt-4">
            <input type="submit" id="sendresponse" value="Terminado" class="btn btn-secondary">
        </div>
    </form>
</div>

</body>

<script type="text/javascript" src= "{{ URL::asset('js/app.js') }}"></script>
<script src="/js/calendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script>
    $('#elem_calidad').multiSelect({
        selectableHeader: "<div class='custom-header'> <strong> Elementos </strong></div>",
        selectionHeader: "<div class='custom-header'> <strong> Opciones escogidas </strong></div>"
    });
</script>
@endauth
</html>
