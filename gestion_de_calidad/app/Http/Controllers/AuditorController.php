<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    public function clasificar(Request $request) {
        $auditorias = Actividad::all();

        return view('clasificarbanderas', compact('auditorias'));
    }

    public function updateTipo() {
        $observaciones = \request('selected');
        $noConformidades = Actividad::all();

        foreach ($noConformidades as $noConformidad) {
            $noConformidad->update(['tipo' => 'No Conformidad']);
        }

        if (!empty($observaciones)){
            foreach ($observaciones as $observacion) {
                Actividad::where('id', $observacion)->update(['tipo' => 'Observacion']);
            }
        }

        return view('dashboardauditor');
    }
}
