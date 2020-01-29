<?php

namespace App\Http\Controllers;
use App\Actividad;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::check()){
        $rol = Auth::user()->rol;
        if($rol == 1){
            $auditorias = Actividad::all();
            if (count($auditorias) > 0) {
                foreach ($auditorias as $auditoria){
                    $fechas[$auditoria->nombre] = date('j n Y', strtotime($auditoria->fecha));
                }
                return view('/dashboardauditor', compact('fechas'));
            } else {
                return view('/dashboardauditor');
            }

        } elseif ($rol == 2) {
            return view('/dashboardvisor');
        }
            return view('/dashboardjc');
        } else {
            return "Porfavor ingresa al sistema";
        }
    }
}



