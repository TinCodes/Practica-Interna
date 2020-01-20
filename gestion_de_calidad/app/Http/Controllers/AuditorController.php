<?php

namespace App\Http\Controllers;

use App\Auditoria;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    public function clasificar(Request $request) {
        $auditorias = Auditoria::all();

        return view('clasificarbanderas', compact('auditorias'));
    }

    public function updateTipo() {
        $observaciones = \request('selected');
        $noConformidades = Auditoria::all();

        foreach ($noConformidades as $noConformidad) {
            $noConformidad->update(['tipo' => 'No Conformidad']);
        }

        if (!empty($observaciones)){
            foreach ($observaciones as $observacion) {
                Auditoria::where('id', $observacion)->update(['tipo' => 'Observacion']);
            }
        }

        return view('dashboardauditor');
    }
}
