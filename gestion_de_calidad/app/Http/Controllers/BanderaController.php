<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Elemcalidad;
use App\Persona;
use Illuminate\Http\Request;

class BanderaController extends Controller
{
    public function index(Request $request) {
        switch ($request->query('by')){
            case "Todas":
                $auditorias = Actividad::where('tipo', 'No Conformidad')->orWhere('tipo', 'Observacion')->get();
                break;

            case "Observaciones":
                $auditorias = Actividad::where('tipo', 'Observacion')->get();
                break;

            case "No Conformidades":
                $auditorias = Actividad::where('tipo', 'No Conformidades')->get();
                break;

            case "Pendientes":
                $auditorias = Actividad::where('estado', 'Pendiente')->get();
                break;

            case "Cerradas":
                $auditorias = Actividad::where('estado', 'Cerrada')->get();
                break;

            default:
                $auditorias = Actividad::where('tipo', 'No Conformidad')->orWhere('tipo', 'Observacion')->get();
                break;
        }

        foreach ($auditorias as $auditoria){
            $auditor = Persona::where('id_persona', $auditoria->id_auditor)->first()->nombre;
            $elem = Elemcalidad::where('id_elem_calidad', $auditoria->elem_calidad)->first()->nombre;
            $auditoria->id_auditor = $auditor;
            $auditoria->elem_calidad = $elem;
        }

        return view('/banderas', compact('auditorias'));
    }
}
