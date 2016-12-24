<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\Models\User;

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

    public function getUsers0() {
        // https://yajrabox.com/docs/laravel-datatables/6.0/add-column#view
        $users = DB::table('users')->select(['users_id', 'username', 'email', 'created_at']);
        return Datatables::of($users)->make();
    }

    /*
     * 
     */
    public function getUsers() {
        //$users = User::select(['users_id', 'username', 'email', 'created_at']);
        $users = DB::table('users')->select(['users_id', 'username', 'email', 'created_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="/admin/users/edit/" class="btn btn-xs btn-primary">Edit</a>
                        <a href="#" class="btn btn-xs btn-danger dt-delete">Delete</a>';
            })
            ->editColumn('users_id', 'ID: {{$users_id}}')
            ->removeColumn('password')
            ->make(true);
    }

}
