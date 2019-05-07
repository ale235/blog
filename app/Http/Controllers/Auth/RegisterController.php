<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Auth;
use Socialite;

//use Illuminate\Contracts\Auth\Authenticatable;



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
    protected $socialRedirectTo = '/blog';

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
            'phone' => 'numeric|min:10',
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

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     * @return Response
     * 1- check if the user exists in our database with facebook_id
     * 2- if not create a new user
     * 3- login this user into our application
     * 4- change mysql database config 'strict' => false,
     * 
     */
    public function handleProviderCallback() {

        try {
            $socialUser = Socialite::driver('facebook')->user();
        } catch (Exception $ex) {
            return redirect('/');
        }

        $user = $this->findOrCreateUser($socialUser);

        Auth::login($user, true);

        //return redirect($this->socialRedirectTo);
        return redirect($this->socialRedirectTo);
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     * 
     *   All Providers ,Facebook, Twitter, LinkedIn, Google, GitHub, Bitbucket 
     *   $user->getId();
     *   $user->getNickname();
     *   $user->getName();
     *   $user->getEmail();
     *   $user->getAvatar();
     * 
     */
    private function findOrCreateUser($facebookUser) {

        $user = User::where('facebook_id', $facebookUser->getId())->first();

        if ($user) {
            return $user;
        }

        return User::create([
            'facebook_id' => $facebookUser->getId(),
            'username' => $facebookUser->getName(),
            'email' => $facebookUser->getEmail(),
            'avatar' => $facebookUser->getAvatar(),
            'users_status_id' => 1,
            'users_role_id' => 3
        ]);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    /*
     * Obtain the user information from Google.
     * @return Response
     * 
     */
    public function handleGoogleCallback() {
        
        try {
            $google = Socialite::driver('google')->user();
        } 
        catch (Exception $e) {
            return redirect('/');
        }

        $user = User::where('google_id', $google->getId())->first();

        if (!$user) {
            $user = User::create([
                'google_id' => $google->getId(),
                'username' => $google->getName(),
                'email' => $google->getEmail(),
                'password' => bcrypt($google->getId()),
                'avatar' => $google->getAvatar(),
                'users_status_id' => 1,
                'users_role_id' => 3        
            ]);
        }

        auth()->login($user);
        #return redirect()->to('/home'); 
        return redirect()->intended($this->socialRedirectTo);
    }
    
    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToTwitter() {
        return Socialite::driver('twitter')->redirect();
    }
    
    /*
     * Obtain the user information from Google.
     * @return Response
     * 
     */
    public function handleTwitterCallback() {
        
        try {
            $google = Socialite::driver('twitter')->user();
        } 
        catch (Exception $e) {
            return redirect('/');
        }

        $user = User::where('twitter_id', $google->getId())->first();

        if (!$user) {
            $user = User::create([
                'google_id' => $google->getId(),
                'username' => $google->getName(),
                'email' => $google->getEmail(),
                'password' => bcrypt($google->getId()),
                'avatar' => $google->getAvatar(),
                'users_status_id' => 1,
                'users_role_id' => 3        
            ]);
        }

        auth()->login($user);
        #return redirect()->to('/home'); 
        return redirect()->intended($this->socialRedirectTo);
    }
    
}
