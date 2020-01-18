<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Elemcalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CronogramaController extends Controller
{
    public function index() {
        $auditorias = Auditoria::all();

        return view('auditoriaspendientes', compact('auditorias'));
    }

    public function create() {
        $elems = $this->showElems();
        return view('planificacionauditor', compact('elems'));
    }

    public function store() {
        $data['nombre'] = \request()->input('nombre');
        $data['estado'] = "Pendiente";
        $data['fecha'] = "STR_TO_DATE('".\request()->input('fecha')."', '%m/%d/%Y')";
        $data['id_auditor'] = Auth::id();
        $data['macroproceso'] = \request()->input('macroproceso');
        $data['proceso'] = \request()->input('proceso');
        $data['contexto'] = 'contexto';
        $data['id_persona'] = 1;
        $data['pdc'] = \request()->input('pdc');
        $data['elem_calidad'] = \request()->input('elem_calidad');

        Auditoria::create($data);

        return redirect('/dashboardauditor');
    }

    public function show($auditoriaID) {
        $auditoria = \App\Auditoria::find($auditoriaID);

        return view('viso');
    }

    public function showElems() {
        return Elemcalidad::all();
    }
}
