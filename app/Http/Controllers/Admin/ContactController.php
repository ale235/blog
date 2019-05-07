<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Admin | Message';
        return view('backend.messages.list', compact('title'));
    }
    
    /*
     * <a href="'.$url_show.'" class="btn btn-xs btn-primary edit_tag">Show</a>
     */
    public function getMessage() {
        $items = DB::table('message')->select(['message_id', 'from_name', 'from_phone', 'from_email', 'subject', 'created_at', 'seen'])->orderBy('created_at','desc');
        return Datatables::of($items)
            ->addColumn('action', function ($item) {
                $url_show = url("/admin/messages/$item->message_id");
                return '<a href="#" route="messages" rel="'.$item->message_id.'" class="btn btn-xs btn-danger dt-delete">Delete</a>';
            })
            ->editColumn('subject', 
                '<a href="{{url(\'/admin/messages/\')}}/{{ $message_id }}" class="seen{{$seen}}">{{ $subject }}</a>'
            )
            ->removeColumn('seen')
            ->make(true);    
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {  
        $message = Contact::findOrFail($id);
        $users = '';
        if($message->users_id){
            $users = DB::table('users')->where('users_id', $message->users_id)->first();
        }
        
        $message->seen = 1;
        $message->updated_at = Carbon::now();  //date('Y-m-d G:i:s') DB::raw('NOW()')
        $message->save();
        
        return view('backend.messages.show', compact('message', 'users'));
    }
    
}
