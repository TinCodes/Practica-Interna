<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $rol = Auth::user()->rol;
        if($rol == 1){
            return view('/dashboardauditor');
        } elseif ($rol == 2) {
            return view('/dashboardvisor');
        } 

        return view('/dashboardjc');
    }

   
}