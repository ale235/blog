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
        $posts = DB::table('posts as p')
            ->select('p.id','p.title','u.username','p.content','p.updated_at','p.summary','p.slug','p.created_at')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->where('p.published', 1)
            ->orderBy('p.created_at', 'desc')
            ->paginate(4);

        return view('frontend.blog', compact('title','posts'));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost($slug) {

        $post = DB::table('posts as p')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->where('p.slug', $slug)
            ->first();

//        $comments = DB::table('comments as c')
//            ->join('users as u','u.users_id','=','c.users_id')
//            ->where('c.post_id','=', $slug)
//            ->orderBy('c.updated_at','desc')
//            ->get();

        return view('frontend.post', compact('post'));
    }
    
}
