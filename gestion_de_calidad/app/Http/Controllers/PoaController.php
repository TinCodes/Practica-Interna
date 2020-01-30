<?php

namespace App\Http\Controllers;

use App\Elemcalidad;
use App\Poa;
use App\User;
use Illuminate\Http\Request;

class PoaController extends Controller
{
    public function index() {
        $poas = Poa::all();

        foreach ($poas as $poa) {
            $poa['elem'] = Elemcalidad::where('id', $poa->elem_calidad)->first()->nombre;
            $poa['jdc'] = User::where('id', $poa->jefe_carrera)->first()->nombre;
        }

        return view('/responderjustificaciones', compact('poas'));
    }

    public function show(Poa $poa){

    }
}
