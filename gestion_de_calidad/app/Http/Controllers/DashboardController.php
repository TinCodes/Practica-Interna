<?php

namespace App\Http\Controllers;
use App\Actividad;
use App\Criterio;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::check()){
            $rol = Auth::user()->rol;
            if($rol == 1){
                $actividades = Actividad::all();
                if (count($actividades) > 0) {
                    foreach ($actividades as $actividad){
                        $fechaHora = date('j-n-Y H:i:s', strtotime($actividad->fechaHora));
                        $fechas[$actividad->nombre] = str_replace('-',' ', explode(" ", $fechaHora)[0]);
                    }
                    return view('/dashboardauditor', compact('fechas'));
                } else {
                    return view('/dashboardauditor');
                }

            } elseif ($rol == 2) {
                $actividades = Actividad::all();
                if (count($actividades) > 0) {
                    foreach ($actividades as $actividad){
                        $fechaHora = date('j-n-Y H:i:s', strtotime($actividad->fechaHora));
                        $fechas[$actividad->nombre] = str_replace('-',' ', explode(" ", $fechaHora)[0]);
                    }
                    return view('/dashboardvisor', compact('fechas'));
                } else {
                    return view('/dashboardvisor');
                }
            } else {
                $actividades = Actividad::all();
                if (count($actividades) > 0) {
                    $jcactividades = Actividad::where('id_persona',Auth::User()->id)->get();
                    return view('/dashboardjc', compact('jcactividades'));
                } else {
                    return view('/dashboardjc');
                }
            }
        } else {
            return "Porfavor ingresa al sistema";
        }
    }
}



