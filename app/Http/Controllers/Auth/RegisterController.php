<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
    protected $redirectTo = '/register/confirm';

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
    protected function create0(array $data) {
        return User::create([
                    'username' => $data['name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'users_status_id' => 2,
                    'users_role_id' => 3,
                    'password' => bcrypt($data['password'])
        ]);
    }

    /*
     * 
     */

    public function register(Request $request) {

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
                    'username' => $request['name'],
                    'phone' => $request['phone'],
                    'email' => $request['email'],
                    'users_status_id' => 2,
                    'users_role_id' => 3,
                    'password' => bcrypt($request['password'])
        ]);
        if (!$user) {
            throw new Exception('Error in saving data!');
        } 
        else {

            $data = ['foo' => 'bar'];

//            Mail::send('frontend.auth.confirm', $data, function($message) {
//                $message->to('arwahtakhdam@gmail.com', 'Halim Lardjane');
//                $message->subject('Verify your email address');
//            });

            //return view('frontend.auth.confirm')->with('success',"Thanks for signing up! Please check your email.");  
            //session()->flash('flash_message', 'Thanks for signing up! Please check your email.');
            return redirect($this->redirectTo);
            
        }
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
        //$data['name'] = 'User' . $randomString;
        $data['name'] = '';
        $data['phone'] = '';
        $data['email'] = 'user' . $randomString . '@gmail.com';
        $data['password'] = '1234';
        $data['password'] = '1234';

        return $data;
    }

}
