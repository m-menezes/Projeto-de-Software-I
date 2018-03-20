<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Organizacao;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('login');
    }

    public function doLogin(Request $request){
        $email          = $request['email-user'];
        $password       = $request['password-user'];
        if (Auth::attempt(['email' => $email, 'password' => $password]) || Auth::guard('org')->attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('home');
        }
        return redirect()->back(); 
    }

    public function logout(){
        Auth::logout();
        Auth::guard('org')->logout();
        return redirect()->route('home');
    }

}
