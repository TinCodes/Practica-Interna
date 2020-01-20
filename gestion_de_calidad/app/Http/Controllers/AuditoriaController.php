<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Elemcalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditoriaController extends Controller
{
    public function index(Request $request) {
        $auditorias = Auditoria::where('estado', $request->query('estado', "Pendiente"))->get();

        return view('auditoriaspendientes', compact('auditorias'));
    }

    public function create() {
        $elems = $this->showElems();
        return view('planificacionauditor', compact('elems'));
    }

    public function store() {
        Auditoria::create($this->getData());

        return redirect('/auditorias');
    }

    public function show(Auditoria $auditoria) {
        return view('visorauditoria', compact('auditoria'));
    }

    public function edit(Auditoria $auditoria) {
        $elems = $this->showElems();
        return view('editarauditoria', compact(['auditoria', 'elems']));
    }

    public function update(Auditoria $auditoria) {
        $auditoria->update($this->getData());

        return redirect('/dashboard');
    }

    public function destroy(Auditoria $auditoria) {
        $auditoria->delete();

        return redirect('/auditorias');
    }

    public function getData() {
        $data['nombre'] = \request()->input('nombre');
        $data['estado'] = "Pendiente";
        $data['tipo'] = "none";
        $data['fecha'] = date('Y-m-d',strtotime(\request()->input('fecha')));
        // TODO  hardcoded id auditor
        $data['id_auditor'] = 1;
        $data['macroproceso'] = \request()->input('macroproceso');
        $data['proceso'] = \request()->input('proceso');
        // TODO  hardcoded contexto
        $data['contexto'] = 'contexto';
        // TODO  hardcoded id persona
        $data['id_persona'] = 2;
        $data['pdc'] = \request()->input('pdc');
        $data['elem_calidad'] = \request()->input('elem_calidad');

        return $data;
    }

    public function showElems() {
        return Elemcalidad::all();
    }
}
