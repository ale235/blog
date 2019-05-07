<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;
use App\Models\User;
use App\Helpers;
use Carbon\Carbon;



class UsersController extends Controller {

    //use Datatables;
    
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

    /**
     * 
     * @Get the users List
     */ 
    public function getUsers() {  

        $users = DB::table('view_users')->select([
            'users_id', 'username', 'email', 'users_role_name', 
            'created_at_us', 'updated_at_us', 'users_status_id', 'users_status_name']
        )->orderBy('created_at','desc');
        
        return Datatables::of($users)
            ->addColumn('actions', function ($user) {
                $url_edit = url("/admin/users/edit/$user->users_id");
                return '<a href="'.$url_edit.'" class="btn btn-xs btn-primary">Edit</a>
                        <a href="#" route="users" rel="'.$user->users_id.'" class="btn btn-xs btn-danger dt-delete">Delete</a>';
            })
            ->editColumn('users_id', 'ID: {{$users_id}}')
            ->editColumn('users_status_name',
                '@if($users_status_id==1) <span class="label label-success">{{$users_status_name}}</span> @else <span class="label label-danger">{{$users_status_name}}</span> @endif'
            )
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
                'username' => $request['username'],
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
        
        return redirect("admin/users/add/");
        //return view('backend.users.add');
    }
    
    /*
     * 
     */
    public function ShowEditUserForm($id) {
        
        $user = User::findOrFail($id);
        
        return view('backend.users.edit', compact('user'));
        
    } 
    
    /*
     * 
     */
    public function EditUser($id, Request $request) {
        $user = User::findOrFail($id);
        
        $check_password = false;
        if($request['reset_password']){
            $check_password=true;
        }
        $rules = $this->rules_user($user->users_id, $check_password);
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
            $updated = $user->update($request->all());
            if($check_password){
                
                User::where('users_id', $id)->update(
                  ['password' => bcrypt($request['password'])]      
                );
  
            }
            Session::flash('notif_type', 'success');
            Session::flash('notif', 'User updated successfully!');
        }
        
        return redirect("admin/users/edit/$id");
        
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
        
        return response()->json([
            'type' => 'success',
            'msg'  => 'User has been deleted!'
        ]);
        
    }  
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules_user($users_id = null, $check_password=false) {
        $rules = [
            'username' => 'required|max:20',
            'phone' => 'numeric|digits_between:10,12',
            'users_role_id' => 'required',
            
        ];
        
        if(!empty($users_id)){
            $rules['email'] = 'required|email|max:45|unique:users,email, ' . $users_id . ',users_id';
        }
        else{
            $rules['email'] = 'required|email|max:45|unique:users';
        }
        
        if($check_password){
            $rules['password'] = 'required|min:4|confirmed';
            $rules['password_confirmation'] = 'required';
        }
        
        return $rules;
    }
    
}
