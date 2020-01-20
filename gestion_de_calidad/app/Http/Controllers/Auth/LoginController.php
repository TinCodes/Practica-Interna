<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
   public function login() {
       $credentials = $this->validate(request(), [
           'mail' => 'required|email',
           'password' => 'required'
       ]);

       $email = $credentials['mail'];
       $password = $credentials['password'];

       
       dd(Auth::attempt(['mail' => $email, 'password' => $password]));

       $user = \App\Persona::where([
        'mail' => $email, 
        'password' => $password
        ])->first();

        if($user){
            $rol = $user->rol;
            if($rol == 1){
                return redirect()->route('/dashboardauditor');
            } elseif ($rol == 2) {
                return redirect()->route('/dashboardvisor');
            } 

            return redirect()->route('/dashboardjc');
        } 
        return back()
        ->withErrors(['mail' => 'Estas credenciales no coinciden con los registros. Intente de nuevo'])
        ->withInput(request(['mail']));

      /* dd(Auth::attempt(['mail' => $email, 'password' => $password]));

    
       if(Auth::attempt(['mail' => $email, 'password' => $password])){
           return 'Sesion exitosa';
            /* Auditor Supervisor JC 
            if($rol == 1){
                return redirect()->route('/dashboardauditor');
            } elseif ($rol == 2) {
                return redirect()->route('/dashboardvisor');
            } 

            return redirect()->route('/dashboardjc');
       }

       return 'Sesion looser';

       /*return back()
        ->withErrors(['mail' => 'Estas credenciales no coinciden con los registros. Intente de nuevo'])
        ->withInput(request(['mail']));*/
   }
}
