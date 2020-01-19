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


Route::get('/cronograma', function () {
    return view('admin.cronograma');
});

Route::post('/auditoria', 'CronogramaController@store');

Route::get('/', function () {
    return view('auth.login');
});

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('/dashboardauditor', 'DashboardController@auditor')->name('/dashboardauditor');

Route::get('/dashboardvisor', 'DashboardController@visor')->name('/dashboardvisor');

Route::get('/dashboardjc', 'DashboardController@jc')->name('/dashboardjc');

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


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
