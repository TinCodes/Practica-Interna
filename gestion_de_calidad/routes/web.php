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

/* ======================================== Main ======================================== */
Route::get('/', function () {
    return view('admin.cronograma');
});


/* ======================================== Login ======================================== */
Route::get('/login', function () {
    return view('login');
});


/* ======================================== Auditorias ======================================== */
Route::get('/auditorias', 'AuditoriaController@index');
Route::get('/auditorias/create', 'AuditoriaController@create');
Route::post('/auditorias', 'AuditoriaController@store');
Route::get('/auditorias/{auditoria}', 'AuditoriaController@show');
Route::get('/auditorias/{auditoria}/edit', 'AuditoriaController@edit');
Route::patch('/auditorias/{auditoria}', 'AuditoriaController@update');
Route::delete('/auditorias/{auditoria}', 'AuditoriaController@destroy');


/* ======================================== Auditor ======================================== */
Route::get('/dashboardauditor', function () {
    return view('dashboardauditor');
});

Route::get('/pendienteauditoria', function () {
    return view('auditoriaspendientes');
});

Route::get('/evalauditoria', function () {
    return view('evalrespuestauditoria');
});

Route::get('/estadoresp', function () {
    return view('estadorespuestas');
});

Route::get('/respjustificaciones', function () {
    return view('responderjustificaciones');
});

Route::get('/revauditorias', function () {
    return view('revisionauditorias');
});

Route::get('/clasificarbanderas', 'AuditorController@clasificar');
Route::post('/clasificarbanderas', 'AuditorController@updateTipo');

Route::get('/banderas', function () {
    return view('banderas');
});

Route::get('/realizarauditorias', function () {
    return view('realizarauditorias');
});

Route::get('/planauditor', function () {
    return view('planificacionauditor');
});


/* ======================================== Supervisor ======================================== */
Route::get('/dashboardvisor', function () {
    return view('dashboardvisor');
});

Route::get('/planvisor', function () {
    return view('planificacionvisor');
});

Route::get('/visorauditoria', function () {
    return view('visorauditoria');
});


/* ======================================== Jefe de Departamento ======================================== */
Route::get('/dashboardjc', 'JCController@index');

Route::get('/auditoriaresp', function () {
    return view('respuestauditoria');
});

Route::get('/formjusti', function () {
    return view('formulariojustificacion');
});
