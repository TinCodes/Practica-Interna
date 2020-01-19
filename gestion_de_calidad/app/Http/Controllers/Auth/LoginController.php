<?php

namespace App\Http\Controllers\Auth;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
   public function login() {
       $credentials = $this->validate(request(), [
           'email' => 'required|email',
           'password' => 'required'
       ]);
    
       $realpsw = \App\UserSG::first()->psw;

       if($realpsw == $credentials['password']){
            $rol = \App\UserSG::first()->rol;

            /* Auditor Supervisor JC */
            if($rol == 1){
                return redirect()->route('/dashboardauditor');
            } elseif ($rol == 2) {
                return redirect()->route('/dashboardvisor');
            } 
            return redirect()->route('/dashboardjc');
       }

       return back()
        ->withErrors(['email' => 'Estas credenciales no coinciden con los registros. Intente de nuevo'])
        ->withInput(request(['email']));
   }
}
