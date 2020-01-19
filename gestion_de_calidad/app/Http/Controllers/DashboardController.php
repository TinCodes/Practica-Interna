<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function auditor() {
        return view('dashboardauditor');
    }

    public function visor() {
        return view('dashboardvisor');
    }

    public function jc() {
        return view('dashboardjc');
    }

   
}
