<?php

namespace App\Http\Controllers;

use App\Criterio;
use App\Elemcalidad;
use App\Poa;
use App\User;
use Illuminate\Http\Request;

class PoaController extends Controller
{
    public function index() {
        $crit[] = Criterio::where('estado','No Conformidad')->orWhere('estado','Observacion')->get();
        $poas = Poa::all();

        foreach ($poas as $poa) {
            $poa['elem'] = Elemcalidad::where('id', $poa->elem_calidad)->first()->nombre;
            $poa['jdc'] = User::where('id', $poa->jefe_carrera)->first()->nombre;
        }

        return view('/responderjustificaciones', compact('poas'));
    }

    public function show(Poa $poa){
        $poa['desc'] = Criterio::where('elem_calidad', $poa->elem_calidad)->where('id_actividad', $poa->id_actividad)->first()->descripcion;

        return view('/evaluarrespuestaauditoria', compact());
    }

    public function aceptar(Poa $poa){
        $poa->update(['estado' => 'Aceptado']);
        $crit = Criterio::where('id_actividad', $poa->id_actividad)->where('elem_calidad', $poa->elem_calidad)->first()->estado;
        $crit->update(['estado' => 'Cumple']);
        return redirect('/dashboard');
    }

    public function rechazar(Poa $poa){
        $poa->update(['estado' => 'Rechazado']);
        return redirect('/dashboard');
    }
}
