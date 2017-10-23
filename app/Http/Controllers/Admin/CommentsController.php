<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Http\Requests\CommentsRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = 'Admin | Post';
        $comments = DB::table('comments')->get();
        return view('backend.comments.list', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CommentsRequest $request)
    {

        $comments = new Comments(
            [
          'content' => $request['content'],
          'seen' => 1,
          'created_at' => Carbon::now(), //date('Y-m-d G:i:s') DB::raw('NOW()')
          'updated_at' => Carbon::now(),  //date('Y-m-d G:i:s') DB::raw('NOW()')
          'post_id' => (int)$request['post_id'],
          'users_id' => Auth::id(),
            ]
        );

        //region como es el new en verdad
        //        $comments = new Comments();
//        $comments->content= $request['content'];
//        $comments->seen = 1;
//        $comments->created_at = Carbon::now();
//        $comments->updated_at = Carbon::now();
//        $comments->post_id = $request['post_id'];
//        $comments->users_id= Auth::id();
        //endregion

        $comments->save();
        return redirect("post/$comments->post_id");

        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
