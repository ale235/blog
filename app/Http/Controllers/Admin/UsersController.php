<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use \User;

class UsersController extends Controller {

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
        $title = 'Admin | Users';
        return view('backend.users.list', compact('title'));
    }
    
    /*
     * 
     */
    public function getUsers() {
       // https://yajrabox.com/docs/laravel-datatables/6.0/add-column#view
        $users = DB::table('users')->select(['users_id', 'username', 'email', 'created_at']);
        return Datatables::of($users)->make();
    }
    
    

}
