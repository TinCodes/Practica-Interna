<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Campus;
use App\Cargo;
use App\Criterio;
use App\Elemcalidad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
    public function index(Request $request) {
        $actividades = Actividad::where('estado', $request->query('estado', "Pendiente"))->get();
        foreach ($actividades as $actividad){
            $fechaHora = date('d/m/Y H:i:s', strtotime($actividad->fechaHora));
            $actividad['fecha'] = explode(" ", $fechaHora)[0];
            $actividad['hora'] = explode(" ", $fechaHora)[1];
        }

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
            $crit->saveOrFail();
        }

        return redirect('/actividades');
    }

    public function show(Actividad $actividad) {
        $fechaHora = date('d-m-Y H:i:s', strtotime($actividad->fechaHora));
        $actividad['fecha'] = explode(" ", $fechaHora)[0];
        $actividad['hora'] = explode(":", explode(" ", $fechaHora)[1])[0];
        $actividad['minuto'] = explode(":", explode(" ", $fechaHora)[1])[1];
        $actividad['auditor'] = User::where('id', $actividad->id_auditor)->first()->nombre;
        $actividad['persona'] = User::where('id', $actividad->id_persona)->first()->nombre;

        $crits = Criterio::where('id_actividad', $actividad->id)->get();
        foreach ($crits as $crit) {
            $elems[] = Elemcalidad::where('id', $crit->elem_calidad)->first();
        }

        return view('visorauditoria', compact(['actividad', 'elems']));
    }

    public function edit(Actividad $actividad) {
        $jdc = $this->showJDC();
        $fechaHora = date('d-m-Y H:i:s', strtotime($actividad->fechaHora));
        $actividad['fecha'] = explode(" ", $fechaHora)[0];
        $actividad['hora'] = explode(":", explode(" ", $fechaHora)[1])[0];
        $actividad['minuto'] = explode(":", explode(" ", $fechaHora)[1])[1];
        $actividad['auditor'] = User::where('id', $actividad->id_auditor)->first()->nombre;

        $crits = Criterio::where('id_actividad', $actividad->id)->get();
        foreach ($crits as $crit) {
            $elemsAct[] = Elemcalidad::where('id', $crit->elem_calidad)->first();
        }

        foreach ($elemsAct as $elem) {
            $ids[] = $elem->id;
        }

        $elems = Elemcalidad::whereNotIn('id', $ids)->get();

        return view('editarauditoria', compact(['actividad', 'elems', 'jdc', 'elemsAct']));
    }

    public function update(Actividad $actividad) {
        $data = $this->getData();
        $elems = array_pop($data);
        $actividad->update($data);

        Criterio::where('id_actividad', $actividad->id)->delete();

        foreach ($elems as $elem) {
            $crit = new Criterio;
            $crit->id_actividad = $actividad->id;
            $crit->elem_calidad = $elem;
            $crit->descripcion = $actividad->descripcion;
            $crit->saveOrFail();
        }

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
        $data['id_auditor'] = Auth::user()->id;
        $data['macroproceso'] = \request()->input('macroproceso');
        $data['descripcion'] = \request()->input('descripcion');
        $data['pdc'] = \request()->input('pdc');
        $data['id_persona'] = \request()->input('persona');
        $data['elem_calidad'] = \request()->input('elem_calidad');

        return $data;
    }

    public function showElems() {
        return Elemcalidad::all();
    }

    public function showJDC() {
        $jdc = User::where('rol', '3')->get();
        foreach ($jdc as $jc) {
            $jc['campus'] = Campus::where('id', $jc->campus)->first()->campus;
            $jc['cargo'] = Cargo::where('id', $jc->cargo)->first()->cargo;
        }
//        dd($jdc);

        return $jdc;
    }
}
