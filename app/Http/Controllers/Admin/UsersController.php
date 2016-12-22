<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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

    /*
     * Get the users List
     */
    public function getUsers() {
        //$users = User::select(['users_id', 'username', 'email', 'created_at']);
        $users = DB::table('users')->select(['users_id', 'username', 'email', 'created_at']);
        //return Datatables::of($users)->make();

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
    public function addUser(Request $request) {
        
        $rules = $this->rules_user();
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
            
            $user = User::create([
                'username' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'users_status_id' => $request['users_status_id'],
                'users_role_id' => $request['users_role_id'],
                'password' => bcrypt($request['password'])
            ]);

            if (!$user) {
                throw new Exception('Error in saving data!');
            } 
            else {
                Session::flash('notif_type', 'success');
                Session::flash('notif', 'User created successfully!');
                //return view('backend.users.add')->with('success',"User created successfully.");  
                //session()->flash('flash_message', 'User created successfully.');
                //return redirect($this->redirectTo);
            }
        }
        
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
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules_user() {
        return[
            'name' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'numeric|digits_between:10,12',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
            'users_role_id' => 'required'
        ];
    }
    
    
    

}
