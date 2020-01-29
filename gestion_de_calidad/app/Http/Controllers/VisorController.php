<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class VisorController extends Controller
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



}
