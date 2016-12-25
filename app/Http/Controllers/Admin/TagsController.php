<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
//use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Helpers;

class TagsController extends Controller {

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
        $title = 'Admin | Tags';
        return view('backend.tags.list', compact('title'));
    }

    /*
     * 
     */
    
    public function getTags() {
        
        $tags = DB::table('tag')->select(['tag_id', 'tag_name', 'created_at', 'updated_at'])->orderBy('created_at','desc');

        return Datatables::of($tags)
            ->addColumn('action', function ($tag) {
                $url_edit = url("/admin/tags/edit/$tag->tag_id");
                return '<a href="#" rel="'.$tag->tag_id.'" class="btn btn-xs btn-primary edit_tag">Edit</a>
                        <a href="#" tab="users" rel="'.$tag->tag_id.'" class="btn btn-xs btn-danger dt-delete">Delete</a>';
            })
            ->make(true);    
    }
    
    /*
     * 
     */
    public function addTag(Request $request) {   
        
        
        
            
        
        
        $rules = array(
            'field' => 'required|unique:tag',
        );
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));
            
        } 
        else {
            
//            DB::table('tag')->insert(
//                ['tag_name' => $request['field']]
//            );
            
            return response()->json([
                'success' => true,
                'type' => 'success',
                'msg'  => 'Tag has been added.'
            ], 200);
            
        }
        
        
    }
    
    
    
}
