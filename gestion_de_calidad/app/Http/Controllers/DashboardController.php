<?php

namespace App\Http\Controllers;
use App\Auditoria;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $rol = Auth::user()->rol;
        if($rol == 1){
            $auditorias = Auditoria::all();

            foreach ($auditorias as $auditoria){
                $fechas[$auditoria->nombre] = date('j n Y', strtotime($auditoria->fecha));
            }
            return view('/dashboardauditor', compact('fechas'));
        } elseif ($rol == 2) {
            return view('/dashboardvisor');
        }

            return view('/dashboardjc');
        }
    }



