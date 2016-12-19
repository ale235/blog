<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
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
    protected $redirectTo = 'blog';
    protected $redirectAfterLogout = 'blog';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        $title = 'LoginForm';
        return view('frontend.auth.login', compact('title'));
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function login(Request $request) {
        $email    = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password, 'users_status_id' => 1])) {
            return redirect()->intended($this->redirectTo);
        } 
        else {
            return back()->withErrors(array('Email or password incorrect!'))->withInput();
        }
    }
    /*
     * authentication with more details
     */
    public function login2(Request $request) {
        
        
    }

    /*
     * 
     */

    public function logout(Request $request) {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect($this->redirectAfterLogout);
    }
    
    /*
     * 
     */

    protected function sendFailedLoginResponse() {
        return back()->withErrors(array('Email or password incorrect!'));
    }

}
