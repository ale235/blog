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
     * Get the users List
     */
    public function getUsers() {
        //$users = User::select(['users_id', 'username', 'email', 'created_at']);
        $users = DB::table('users')->select(['users_id', 'username', 'email', 'created_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="/admin/users/edit/'.$user->users_id.'" class="btn btn-xs btn-primary">Edit</a>
                        <a href="#" tab="users" rel="'.$user->users_id.'" class="btn btn-xs btn-danger dt-delete">Delete</a>';
            })
            ->editColumn('users_id', 'ID: {{$users_id}}')
            ->removeColumn('password')
            ->make(true);    
    }
    
    /*
     * 
     */

    public function ShowAddUserForm() {
        return view('backend.users.add');
    }
    
    /*
     * 
     */
    public function addUser() {
        return view('backend.users.add');
    }
    
    /*
     * 
     */
    public function ShowEditUserForm() {
        return view('backend.users.edit');
    } 
    
    /*
     * 
     */
    public function EditUser() {
        return view('backend.users.edit');
    }  
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteUser($id) {
        
        $user = User::findOrFail($id);
        $user->delete();
        
        Session::flash('notif_type', 'success');
        Session::flash('notif', 'User has been deleted!');
        
        return redirect('admin/users');
        
    }  
    

}
