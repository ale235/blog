<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SinglePageController extends Controller {

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
//        dd();
        $title = 'SinglePage';

        return view('backend.singlepage', compact('title'));
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function header() {
//        dd();
        $title = 'headerPage';
//        dd($title);

        return view('backend.singlepage.header', compact('title'));

    }

    public function headerestilouno(Request $request) {
        Header::create([
            'image_path' => $request->get('filepath'),
            'style_type' => 1
        ]);

        return view('backend.singlepage.header');

    }

    public function headerestilodos(Request $request) {
        Header::create([
            'image_path' => $request->get('filepath2'),
            'text_title' => $request->get('title_text'),
            'text_subtitle' => $request->get('subtitle_text'),
            'style_type' => 0
        ]);

        return Redirect::to('backend/singlepage/header');

    }

}
