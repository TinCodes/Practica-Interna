<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Criterio;
use App\Elemcalidad;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadoRespuestasController extends Controller
{
    public function show(Actividad $actividad, Elemcalidad $elem) {
        $elem['desc'] = Criterio::where('id_actividad',$actividad->id)->where('elem_calidad', $elem->id)->first()->descripcion;

        return view('/respuestauditoria', compact(['actividad', 'elem'])); 
    }
    
    public function store(){
        $data['descripcion'] = \request()->input('planAccion');
        $data['auditor'] = \request()->input('auditor');;
        $data['jefe_carrera'] = Auth::user()->id;
        $data['fechaVencimiento'] = date('Y-m-d', strtotime(\request()->input('fechaPlan')));
        $data['id_actividad'] = \request()->input('actividad');
        $data['elem_calidad'] = \request()->input('elemId');

        \App\Poa::create($data);
        
        return redirect('dashboard');
    }
    
}
