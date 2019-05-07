<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfileForm() {
        $title = 'Contact';
        return view('frontend.user.profile', compact('title'));
    }

    /**
     * 
     */
    public function updateProfile() {
        return redirect('/profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordForm() {
        $title = 'Cahnge password';
        return view('frontend.user.change_password', compact('title'));
    }

    /**
     * 
     */
    public function updatePassword() {
        return redirect('/change_password');
    }

}
