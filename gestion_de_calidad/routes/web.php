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
    return view('welcome');
});

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

Route::get('/formjusti', function () {
    return view('-formulariojustificacion');
});

Route::get('/respjustificaciones', function () {
    return view('responderjustificaciones');
});
