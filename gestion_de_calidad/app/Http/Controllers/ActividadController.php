<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Criterio;
use App\Elemcalidad;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
    public function index(Request $request) {
        $actividades = Actividad::where('estado', $request->query('estado', "Pendiente"))->get();

        return view('auditoriaspendientes', compact('actividades'));
    }

    public function create() {
        $elems = $this->showElems();
        $jdc = $this->showJDC();
        $currentAud = Auth::user()->nombre;

        return view('planificacionauditor', compact(['elems', 'jdc', 'currentAud']));
    }

    public function store() {
        $data = $this->getData();
        $elems = array_pop($data);
        $actividad = Actividad::create($data);

        foreach ($elems as $elem) {
            $crit = new Criterio;
            $crit->id_actividad = $actividad->id;
            $crit->elem_calidad = $elem;
            $crit->descripcion = $actividad->descripcion;
        }

        return redirect('/actividades');
    }

    public function show(Actividad $actividad) {
        $fechaHora = date('d/m/Y H:i:s', strtotime($actividad->fechaHora));
        $actividad['fecha'] = $fechaHora;
        dd($actividad);

        $elems = Elemcalidad::where()->get();

        return view('visorauditoria', compact(['actividad', 'elems']));
    }

    public function edit(Actividad $actividad) {
        $elems = $this->showElems();
        $jdc = $this->showJDC();
        $fechaHora = date('d/m/Y H:i:s', strtotime($actividad->fechaHora));
        $actividad['fecha'] = $fechaHora;
        return view('editarauditoria', compact(['actividad', 'elems', 'jdc']));
    }

    public function update(Actividad $actividad) {
        $actividad->update($this->getData());

        return redirect('/dashboard');
    }

    public function destroy(Actividad $actividad) {
        $actividad->delete();

        return redirect('/actividades');
    }

    public function getData() {
        $data['nombre'] = \request()->input('nombre');
//        $data['estado'] = "Pendiente";
//        $data['tipo'] = "none";
        $date = new \DateTime(date('Y-m-d', strtotime(\request()->input('fecha'))));
        $date->setTime(\request()->input('hora'), \request()->input('minuto'));
        $data['fechaHora'] = $date->format('Y-m-d H:i:s');
        // TODO  hardcoded id auditor
        $data['id_auditor'] = Auth::user()->id;
        $data['macroproceso'] = \request()->input('macroproceso');
        // TODO  hardcoded contexto
        $data['descripcion'] = \request()->input('descripcion');
        // TODO  hardcoded id persona
        $data['pdc'] = \request()->input('pdc');
        $data['id_persona'] = 2;
        $data['elem_calidad'] = \request()->input('elem_calidad');

        return $data;
    }

    public function showElems() {
        return Elemcalidad::all();
    }

    public function showJDC() {
        return Persona::where('rol', '3')->get();
    }
}
