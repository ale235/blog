<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/register/confirmation';
    protected $redirectAfterLogout = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'numeric|min:8',
            'password' => 'required|min:4|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
            'username' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'users_status_id' => 2,
            'users_role_id' => 3,
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * Show the application register form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm() {
        //parent::showRegistrationForm();
        $data = array();
        
        $data = $this->example_of_user();
        $data['title'] = 'RegisterForm';
        
        return view('frontend.auth.register', $data);
    }

    /*
     * Get Random user for testing
     */
    
    private function example_of_user() {
        $data = array();
        $randomString = \App\Helpers::generateRandomString(1);
        $data['name'] = 'User' . $randomString;
        $data['phone'] = '';
        $data['email'] = 'user' . $randomString . '@gmail.com';
        $data['password'] = '1234';
        $data['password'] = '1234';

        return $data;
    }
    

}
