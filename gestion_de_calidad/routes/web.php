<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ======================================== Login ======================================== */
Route::get('/', function () {
    return view('auth.login');
});

Route::post('mylogin', 'Auth\LoginController@login')->name('mylogin');


/* ======================================= Logout ======================================== */

Route::get('/logout', 'Auth\LoginController@logout')->name('/logout');

/* ======================================= Users ========================================= */

Route::get('users/export/', 'UsersController@export');

Route::get('/createWord',['as'=>'createWord','uses'=>'WordTestController@createWordDocx']);


/* ======================================= Dashboards ======================================== */

Route::get('/dashboard','DashboardController@index')->name('/dashboard');

Route::get('/modbanderas', 'BanderaController@mostrar');
Route::post('/modbanderas', 'BanderaController@store');
Route::get('/modbanderas/{actividad}', 'BanderaController@show');
Route::get('/modbanderas/{actividad}/{elem}/edit', 'BanderaController@edit');
Route::patch('/modbanderas/{actividad}/{elem}', 'BanderaController@update');

/* ======================================= Rutas Compartidas ================================= */
Route::get('/banderas', 'BanderaController@index');
Route::post('/search', 'BanderaController@find');

Route::group(['middleware' => ['auth', '4']], function() {

    Route::get('/pendienteauditoria', function () {
        return view('auditoriaspendientes');
    });

    /* ======================================== Actividades ======================================== */
    Route::get('/actividades', 'ActividadController@index');
    Route::get('/actividades/create', 'ActividadController@create');
    Route::post('/actividades', 'ActividadController@store');
    Route::get('/actividades/{actividad}', 'ActividadController@show');
    Route::get('/actividades/{actividad}/edit', 'ActividadController@edit');
    Route::patch('/actividades/{actividad}', 'ActividadController@update');
    Route::delete('/actividades/{actividad}', 'ActividadController@destroy');
    Route::get('/actividades/{actividad}/cerrar', 'ActividadController@cerrar');

});

/* ======================================== Auditor ======================================== */

Route::group(['middleware' => ['auth', '1']], function() {
    Route::get('/dashboardauditor', function () {
        return view('dashboardauditor');
    });



    Route::get('/evalauditoria', function () {
        return view('evalrespuestauditoria');
    });

    Route::get('/justificaciones', 'PoaController@index');
    Route::get('/justificaciones/{poa}', 'PoaController@show');
    Route::patch('/justificaciones/{poa}/aceptar', 'PoaController@aceptar');
    Route::patch('/justificaciones/{poa}/rechazar', 'PoaController@rechazar');

    Route::get('/revauditorias', function () {
        return view('revisionauditorias');
    });

    Route::post('/clasificarbanderas', 'AuditorController@updateTipo');

    Route::get('/realizarauditoria/{actividad}', 'BanderaController@clasificar');

    Route::get('/planauditor', function () {
        return view('planificacionauditor');
    });

    Route::get('/formjusti', function () {
        return view('formulariojustificacion');
    });


    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');



});


/* ======================================== Supervisor ======================================== */

Route::group(['middleware' => ['auth', '2']], function() {
    Route::get('/dashboardvisor', function () {
        return view('dashboardvisor');
    });

    Route::get('/planvisor', function () {
        return view('planificacionvisor');
    });

    Route::get('/visorauditoria', function () {
        return view('visorauditoria');
    });

});
/* ======================================== Jefe de Departamento ======================================== */
Route::group(['middleware' => ['auth', '3']], function() {
    Route::get('/dashboardjc', 'JCController@index');

    Route::get('/auditoriaresp', function () {
        return view('respuestauditoria');
    });

    Route::get('/estadoresp', function () {
        return view('estadorespuestas');
    });

    Route::get('/respuestas/{actividad}/{elem}', 'EstadoRespuestasController@show');
    Route::post('/respuestas', 'EstadoRespuestasController@store');

});
