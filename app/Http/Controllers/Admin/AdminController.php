<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

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
        dd();
        $title = 'Admin';
        $nbr_post = DB::table('post')->count();
        $nbr_comments = DB::table('comments')->where('seen', '<>', 1)->count();
        $nbr_survey = DB::table('users_survey')->where('seen', '<>', 1)->count();
        $nbr_message = DB::table('message')->where('seen', '<>', 1)->count();

        return view('backend.home', compact('title', 'nbr_post', 'nbr_comments', 'nbr_survey', 'nbr_message'));
       
    }

}
