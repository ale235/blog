<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';

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
    public function login(\Illuminate\Http\Request $request) {

        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password, 'users_status_id' => 2])) {

            return redirect()->intended($redirectTo);
        } else {

            return back()->withErrors(array('Email or password incorrect or Account not active!'));
        }
    }

    /*
     * 
     */

    public function logout() {
        //Auth::logout();
        //return Redirect::to('login');
    }

    /*
     * 
     */

    protected function sendFailedLoginResponse() {

        // return response()->json( [ 'status' => false, 'message' => $this->getFailedLoginMessage() ]);

        return back()->withErrors(array('Email or password incorrect!'));
    }

}
