<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

}
