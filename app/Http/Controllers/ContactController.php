<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \App\Http\Requests\ContactRequest;


class ContactController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Contact';
        return view('frontend.contact', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request) {
        
        $message = new \App\Models\Contact([
            'from_name' => $request['name'], 
            'from_phone' => $request['phone'], 
            'from_email' => $request['email'], 
            'subject' => $request['subject'], 
            'message_text' => $request['message']
        ]);
        
        if (Auth::check()){
            $message['users_id'] = Auth::id();
        }
        
        $message->save();

        Session::flash('notif_type', 'success');
        Session::flash('notif', 'Thank You, we will reach out to you shortly!');
        return redirect("/contact");
    }
}
