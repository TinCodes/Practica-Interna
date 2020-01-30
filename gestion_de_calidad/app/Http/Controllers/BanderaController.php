<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Criterio;
use App\Elemcalidad;
use App\User;
use Illuminate\Http\Request;

class BanderaController extends Controller
{
    public function index(Request $request) {
        $actividades = [];
        $elems = [];
        switch ($request->query('by')){
            case "Todas":
                $crits = Criterio::where('estado', 'No Conformidad')->orWhere('estado', 'Bandera')->orWhere('estado', 'Observacion')->orWhere('estado', 'Pendiente')->orWhere('estado', 'Cerrada')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;

            case "Observaciones":
                $crits = Criterio::where('estado', 'Observacion')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;

            case "No Conformidades":
                $crits = Criterio::where('estado', 'No Conformidad')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;

            case "Banderas":
                $crits = Criterio::where('estado', 'Bandera')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;

            case "Pendientes":
                $crits = Criterio::where('estado', 'Pendiente')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;

            case "Cerradas":
                $crits = Criterio::where('estado', 'Cerrada')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;

            default:
                $crits = Criterio::where('estado', 'No Conformidad')->orWhere('estado', 'Observacion')->orWhere('estado', 'Bandera')->get();
                $actividades = $this->getActElem($crits)[0];
                $elems = $this->getActElem($crits)[1];
                break;
        }

        return view('/banderas', compact(['crits', 'elems', 'actividades']));
    }

    public function getActElem($crits) {
        $actividades = [];
        $elems = [];
        foreach ($crits as $crit) {
            if (!array_key_exists($crit->id_actividad, $actividades)){
                $actividades[$crit->id_actividad] = Actividad::where('id', $crit->id_actividad)->first();
                foreach ($actividades as $actividad){
                    $this->getMoreData($actividad);
                }
            }
            $elems[] = Elemcalidad::where('id', $crit->elem_calidad)->first();
        }

        foreach ($elems as $elem) {
            $elem['estado'] = Criterio::where('elem_calidad', $elem->id)->first()->estado;
            $elem['descripcion'] = Criterio::where('elem_calidad', $elem->id)->first()->descripcion;
        }

        return [$actividades, $elems];
    }

    public function mostrar(){
        $crits = Criterio::whereNotIn('estado', ['Bandera', 'Cumple', 'Recomendacion'])->get();
        foreach ($crits as $crit){
            $actividades = Actividad::where('estado', '!=', 'Cerrado')->where('id', $crit->id_actividad)->get();
        }
        if (!empty($actividades)){
            foreach ($actividades as $actividad) {
                $this->getMoreData($actividad);

                $crits = Criterio::where('id_actividad', $actividad->id)->get();

                foreach ($crits as $crit) {
                    $elems[$actividad->nombre][] = Elemcalidad::where('id', $crit->elem_calidad)->first();
                }
            }

            if (!empty($elems)){
                return view('/elegirbanderas', compact(['actividades', 'elems']));
            } else {
                return view('/elegirbanderas', compact('actividades'));
            }
        } else {
            $actividades = [];
            return view('/elegirbanderas', compact('actividades'));
        }
    }

    public function clasificar(Actividad $actividad) {
        $crits = Criterio::where('id_actividad', $actividad->id)->where('estado', '!=', 'Bandera')->get();
        foreach ($crits as $crit) {
            $elems[] = Elemcalidad::where('id', $crit->elem_calidad)->first();
        }

        return view('/realizarauditorias', compact(['actividad', 'elems']));
    }

    public function store() {
        $data = $this->getData();
        $id = array_pop($data);

        foreach ($data as $key => $val) {
            if (is_numeric($key)) {
               Criterio::where('id_actividad', $id)->where('elem_calidad', $key)->update(['estado' => $val]);
            } else {
                Criterio::where('id_actividad', $id)->where('elem_calidad', substr($key, 4))->update(['descripcion' => $val]);
            }
        }

        return redirect('/modbanderas');
    }

    public function show(Actividad $actividad) {
        $this->getMoreData($actividad);

        $crits = Criterio::where('id_actividad', $actividad->id)->get();
        foreach ($crits as $crit) {
            $elems[] = Elemcalidad::where('id', $crit->elem_calidad)->first();
        }

        return view('clasificarbanderas', compact(['actividad', 'elems']));
    }

    public function edit(Actividad $actividad, Elemcalidad $elem){
        $this->getMoreData($actividad);
        $elem['estado'] = Criterio::where('id_actividad', $actividad->id)->where('elem_calidad', $elem->id)->first()->estado;

        return view('/clasificarbanderas', compact(['actividad', 'elem']));
    }

    public function update(Actividad $actividad, Elemcalidad $elem){
        Criterio::where('id_actividad', $actividad->id)->where('elem_calidad', $elem->id)->update(['estado' => \request()->input('estado')]);
        Criterio::where('id_actividad', $actividad->id)->where('elem_calidad', $elem->id)->update(['descripcion' => \request()->input('desc')]);

        return redirect('/banderas');
    }

    public function find() {
        $query = \request()->input('search');
        $actividades = Actividad::where('nombre', 'LIKE', '%' . $query . '%')->get();
        foreach ($actividades as $actividad) {
            $this->getMoreData($actividad);
            $crits[] = Criterio::where('id_actividad', $actividad->id)->first();
        }
        foreach ($crits as $crit){
            $elems[] = Elemcalidad::where('id', $crit->elem_calidad)->first();
        }

        return view('/banderas', compact(['crits', 'elems', 'actividades']));
    }

    public function getMoreData($actividad) {
        $fechaHora = date('d-m-Y H:i:s', strtotime($actividad->fechaHora));
        $actividad['fecha'] = explode(" ", $fechaHora)[0];
        $actividad['hora'] = explode(":", explode(" ", $fechaHora)[1])[0];
        $actividad['minuto'] = explode(":", explode(" ", $fechaHora)[1])[1];
        $actividad['auditor'] = User::where('id', $actividad->id_auditor)->first()->nombre;
        $actividad['persona'] = User::where('id', $actividad->id_persona)->first()->nombre;

        return $actividad;
    }

    public function getData() {
        $data = \request()->all();
        unset($data['_token']);
        array_pop($data);

        return $data;
    }

}
