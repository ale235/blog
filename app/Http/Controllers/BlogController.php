<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use \App\Helpers;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Blog';
        
        $tags = DB::table('tag')->select('tag_id', 'tag_name', 'tag_slug')->get();
        $survey = DB::table('survey')->where('active', 1)->orderBy('created_at', 'desc')->first();
        $post = DB::table('post')->where('published', 1)->orderBy('created_at', 'desc')->first();
        $responses ='';
        if(!empty($survey)){
            $responses = DB::table('response')->where('survey_id', $survey->survey_id)->get();
        }
       // dd($survey);
        return view('frontend.blog', compact('title', 'tags', 'survey', 'responses','post'));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost($id) {
        $title = 'Blog | Post';
        //dd($id);
        $post = DB::table('post')->where('post_id', $id)->first();
        return view('frontend.post', compact('post'));
    }
    
}
