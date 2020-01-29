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



/* ======================================= Dashboards ======================================== */

Route::get('/dashboard','DashboardController@index')->name('/dashboard');

/* ======================================= Rutas Compartidas ================================= */

Route::get('/banderas', 'BanderaController@index');

Route::get('/pendienteauditoria', function () {
    return view('auditoriaspendientes');
});

/* ======================================== Auditor ======================================== */

Route::group(['middleware' => ['auth', '1']], function() {
    Route::get('/dashboardauditor', function () {
        return view('dashboardauditor');
    });

    

    Route::get('/evalauditoria', function () {
        return view('evalrespuestauditoria');
    });

    Route::get('/respjustificaciones', function () {
        return view('responderjustificaciones');
    });

    Route::get('/revauditorias', function () {
        return view('revisionauditorias');
    });

    Route::get('/clasificarbanderas', 'AuditorController@clasificar');
    Route::post('/clasificarbanderas', 'AuditorController@updateTipo');

    Route::get('/realizarauditorias', function () {
        return view('realizarauditorias');
    });

    Route::get('/planauditor', function () {
        return view('planificacionauditor');
    });

    Route::get('/formjusti', function () {
        return view('formulariojustificacion');
    });


    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    /* ======================================== Actividades ======================================== */
    Route::get('/actividades', 'ActividadController@index');
    Route::get('/actividades/create', 'ActividadController@create');
    Route::post('/actividades', 'ActividadController@store');
    Route::get('/actividades/{actividad}', 'ActividadController@show');
    Route::get('/actividades/{actividad}/edit', 'ActividadController@edit');
    Route::patch('/actividades/{actividad}', 'ActividadController@update');
    Route::delete('/actividades/{actividad}', 'ActividadController@destroy');

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

});
