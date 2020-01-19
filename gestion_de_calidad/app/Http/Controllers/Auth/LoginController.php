<?php

namespace App\Http\Controllers\Auth;
use Auth;

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
       //$realpsw = \App\::first()->psw;

       if(Auth::attempt($credentials)){
            return 'YES';
       }
       return 'NO';

      /* return back()
        ->withErrors(['mail' => 'Estas credenciales no coinciden con los registros. Intente de nuevo'])
        ->withInput(request(['mail']));*/
   }
}
