<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Helpers;
use Illuminate\Database\Query\Builder;
use App\Models\Tag;
use Carbon\Carbon;

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
                        <a href="#" route="tags" rel="'.$tag->tag_id.'" class="btn btn-xs btn-danger dt-delete">Delete</a>';
            })
            ->make(true);    
    }
    
    /*
     * 
     */
    public function addTag(Request $request) {   
        
        $rules = array(
            'tag_name' => 'required'
        );
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));
            
        } 
        else {
            
            $slug = str_slug($request['tag_name'], '-');
            
            DB::table('tag')->insert([
                'tag_name' => $request['tag_name'],
                'tag_slug' => $slug 
            ]);
            
            return response()->json([
                'success' => true,
                'type' => 'success',
                'msg'  => 'Tag has been added.'
            ], 200);
            
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $tag = DB::table('tag')->where('tag_id', '=', $id);
        if(!$tag){
            die('nor exit -> redirect');
        }
        
        $tag->delete();
        return response()->json([
            'type' => 'success',
            'msg'  => 'Tag has been deleted!'
        ]);      
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showEditTag($id) {
        //$tag = Tag::findOrFail($id);
        //$tag = DB::table('tag')->where('tag_id', '37')->get();
        //$tag = DB::select('select tag_id, tag_name from tag where tag_id = ?', array($id));
        //$tag = DB::table('tag')->where('tag_id', '=', 37)->get();
        
        $tag = DB::table('tag')->select('tag_id', 'tag_name')->where('tag_id', $id)->first();
        
        if($tag){
            return response()->json([
                'success' => true,
                'tag' => $tag
            ], 200);
        }
        else{
            
        }
        
    }
    
    /*
     * 
     */
    public function update($id, Request $request) {
      
        //$tag = DB::table('tag')->where('tag_id', '=', $id);
        $tag = DB::table('tag')->where('tag_id', $id)->first();
        if(!$tag){
            die('nor exit -> redirect');
        }
        
        $rules = array('tag_name' =>  'required|min:2|max:20|unique:tag');           
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        } 
        else {
            
            $slug = str_slug($request['tag_name'], '-');
            
            DB::table('tag')->where('tag_id', $id)
                    ->update([
                        'tag_name' => $request['tag_name'],
                        'tag_slug' => $slug,
                        'updated_at' =>  Carbon::now()  //date('Y-m-d G:i:s') DB::raw('NOW()')
                    ]);
            return response()->json([
                'success' => true,
                'type' => 'success',
                'msg'  => 'Tag has been updated.'
            ]);
        }
        
    } 
    
    
    
}
