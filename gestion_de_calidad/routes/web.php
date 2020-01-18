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

Route::get('/', function () {
    return view('admin.cronograma');
});

Route::get('/cronograma', function () {
    return view('admin.cronograma');
});

Route::post('/auditoria', 'CronogramaController@store');

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboardauditor', function () {
    return view('dashboardauditor');
});

Route::get('/dashboardvisor', function () {
    return view('dashboardvisor');
});

Route::get('/dashboardjc', function () {
    return view('dashboardjc');
});


Route::get('/auditoriaresp', function () {
    return view('respuestauditoria');
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

// MEJORAR EL SELECT

Route::get('/formjusti', function () {
    return view('formulariojustificacion');
});

Route::get('/respjustificaciones', function () {
    return view('responderjustificaciones');
});

Route::get('/revauditorias', function () {
    return view('revisionauditorias');
});

Route::get('/clasificarbanderas', function () {
    return view('clasificarbanderas');
});

Route::get('/banderas', function () {
    return view('banderas');
});

Route::get('/realizarauditorias', function () {
    return view('realizarauditorias');
});

Route::get('/planauditor', function () {
    return view('planificacionauditor');
});

Route::get('/planvisor', function () {
    return view('planificacionvisor');
});

Route::get('/planvisor', function () {
    return view('planificacionvisor');
});

Route::get('/visorauditoria', function () {
    return view('visorauditoria');
});

