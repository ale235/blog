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
        $posts = DB::table('post as p')
            ->select('p.post_id','p.title','u.username','p.content','p.updated_at','p.image','p.summary','p.slug','p.created_at')
            ->join('users as u', 'p.users_id', '=', 'u.users_id')
            ->where('p.published', 1)
            ->orderBy('p.created_at', 'desc')
            ->paginate(4);
        $responses ='';
        if(!empty($survey)){
            $responses = DB::table('response')->where('survey_id', $survey->survey_id)->get();
        }
        return view('frontend.blog', compact('title', 'tags', 'survey', 'responses','posts'));
//        return view('frontend.welcome');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost($slug) {
        $post = DB::table('post as p')
            ->join('users as u', 'p.users_id', '=', 'u.users_id')
            ->where('p.slug', $slug)
            ->first();

        $comments = DB::table('comments as c')
            ->join('users as u','u.users_id','=','c.users_id')
            ->where('c.post_id','=', $slug)
            ->orderBy('c.updated_at','desc')
            ->get();

        return view('frontend.post', compact('post','comments'));
    }
    
}
