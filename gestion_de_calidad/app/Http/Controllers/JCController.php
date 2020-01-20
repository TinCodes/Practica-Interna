<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JCController extends Controller
{
    public function index() {
        return view('/dashboardjc');
    }
}
