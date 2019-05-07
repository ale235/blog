<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();
        return view('backend.settings.profile', compact('user'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request) {
        $user = Auth::user();
        
        $rules = $this->rules_profile($user->users_id);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
            $user->update($request->all());
            Session::flash('notif_type', 'success');
            Session::flash('notif', 'Your profile has been updated!'); 
            return redirect('admin/profile');
            //return view('backend.settings.profile', compact('user'));
        }
    } 
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordForm() {
        return view('backend.settings.password');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request) {
        $user = Auth::user();
        
        $rules = array(
            'current_password' => 'required',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else { 
            $current_password = $request->get('current_password');
            $new_password = bcrypt($request->get('password')); 
            
            if (!Hash::check($current_password, $user->password)) {
                Session::flash('notif_type', 'danger');
                Session::flash('notif', 'The Old Password is incorect!');
            }
            else{
                $user->update(['password' => $new_password]);
            
                Session::flash('notif_type', 'success');
                Session::flash('notif', 'Password has been reseted!');
            }
            
            return view('backend.settings.password');
            
        }
    }
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules_profile($users_id) {
        return [
            'username' => 'required|min:3|max:15',
            'phone' => 'numeric|digits_between:10,12',
            'email' => 'required|email|max:45|unique:users,email, ' . $users_id . ',users_id'
        ];
    }
     
    
}
