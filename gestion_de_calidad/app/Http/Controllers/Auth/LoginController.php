<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    public function login() {

        $credentials = $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        $email = $credentials['email'];
        $password = $credentials['password'];

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $rol = Auth::user()->rol;

            return redirect()->route('/dashboard');
            
        }
        return back()
        ->withErrors(['email' => 'Estas credenciales no coinciden con los registros. Intente de nuevo'])
        ->withInput(request(['email']));
    }

    public function logout() {
        Auth::logout();
        return view('auth.login');
      }
    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/
}
