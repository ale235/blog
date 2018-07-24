<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Admin | Post';
        $posts = DB::table('view_post')->select(['post_id', 'title', 'published', 'seen', 'users_id', 'username', 'created_at_us', 'updated_at_us'])->paginate(30);
        return view('backend.post.list', compact('title','posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostList() {
        $posts = DB::table('view_post')->select(['post_id', 'title', 'published', 'seen', 'users_id', 'username', 'created_at_us', 'updated_at_us']);

        return Datatables::of($posts)
                        ->addColumn('action', function ($post) {
                            $url_edit = url("/admin/post/$post->post_id/edit");
                            return '<a href="' . $url_edit . '" class="btn btn-xs btn-primary">Edit</a>
                        <a href="#" route="post" rel="' . $post->post_id . '" class="btn btn-xs btn-danger dt-delete">Delete</a>';
                        })
                        ->editColumn('title', '@if($seen==0) <strong><a href="{{url(\'/admin/post/\')}}/{{ $post_id }}">{{ $title }}</a></strong> '
                                . '@else <a href="{{url(\'/admin/post/\')}}/{{ $post_id }}">{{ $title }}</a> @endif'
                        )
                        ->editColumn('username', '<a href="{{url(\'/admin/users/edit/\')}}/{{ $users_id }}">{{ $username }}</a>'
                        )
                        ->editColumn('published', '@if($published==1) <input type="checkbox" name="published" class="published" value="{{ $post_id }}" checked> @else <input type="checkbox" name="published" class="published" value="{{ $post_id }}"> @endif'
                        )
                        ->removeColumn('seen', 'users_id')
                        ->make(true);
    }

   
    
    /**
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function publish($id, Request $request) {

        $post = Post::findOrFail($id);
        $published = $request['published'] ?: 0;

        $post->update(array(
            'published' => $published,
            'updated_at' => Carbon::now()  //date('Y-m-d G:i:s') DB::raw('NOW()')
        ));

        $msg = 'Post has been UnPublished.';
        if ($published == 1)
            $msg = 'Post has been Published.';

        return response()->json([
                    'success' => true,
                    'type' => 'success',
                    'msg' => $msg
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (!empty($_POST)) {
            //print_r($_POST);
            //exit;
        }
        //echo Auth::id(); exit;
        return view('backend.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request) {
        
        //\App\Helpers::print_r($_POST); exit;
        $post = new Post([
            'title' => $request['title'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'seen' => 1,
            'published' => $request['published'] ?: 0,
            'users_id' => Auth::id(),
            'updated_at' => Carbon::now(), //date('Y-m-d G:i:s') DB::raw('NOW()')
            'created_at' => Carbon::now()  //date('Y-m-d G:i:s') DB::raw('NOW()')
        ]);

        $detail=$request['content'];

        $dom = new \domdocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            list($type, $data) = array_pad(explode(';', $data),2,null);
            list(, $data)      = array_pad(explode(',', $data),2,null);

            $data = base64_decode($data);

            $image_name= time().$k.'.png';
            $path =  public_path() .'/uploads/'. $image_name;
            $base_path = $path;
            str_replace('\\', '/', $base_path);
            file_put_contents($base_path, $data);
            $img->removeattribute('src');
            $img->setattribute('src', URL::to('/') .'/uploads/'. $image_name);
        }

        $detail = $dom->savehtml();
        $porciones = explode("<hr>", $detail);
        $post->content = $detail;
        $post->summary = $porciones[0];
        $nada = strip_tags($porciones[0]);
        $cadena = trim($nada, "[\n|\r|\n\r]");
        $post->description = $cadena;


//        dd($request);
        if (!empty($request['slug'])) {
            $slug = str_slug($request['slug'], '-');
        }

        if (!empty($request['slug'])) {
            $slug = str_slug($request['slug'], '-');
        } else
            $slug = str_slug($request['title'], '-');
        $post['slug'] = $slug;

        $post->save();

        Session::flash('notif_type', 'success');
        Session::flash('notif', 'Post has been created!');

        //return redirect("admin/post/create");
        return redirect("admin/post/$post->post_id/edit");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $post = Post::findOrFail($id);
        return view('backend.post.show', compact('post'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::findOrFail($id);
//        dd($post);
        return view('backend.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id) {
        $post = Post::findOrFail($id);
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        //dd($request);
        $detail=$request['content'];

        $dom = new \domdocument();

        $dom->loadHTML(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getelementsbytagname('img');


        if($request->hasFile('files')){
            foreach($images as $k => $img){
                $data = $img->getattribute('src');
                // Supongo que la cantidad de caracteres de un base 64 va a ser mayor que la ruta de si existe la imagen
                if(strlen($data)>1000){
                    list($type, $data) = array_pad(explode(';', $data),2,null);
                    list(, $data)      = array_pad(explode(',', $data),2,null);


                    $data = base64_decode($data);

                    $image_name= time().$k.'.png';
                    $path =  public_path() .'/uploads/'. $image_name;
                    $base_path = $path;
                    str_replace('\\', '/', $base_path);


                    file_put_contents($base_path, $data);
                    $img->removeattribute('src');
                    $img->setattribute('src', URL::to('/') .'/uploads/'. $image_name);
                }
            }
        }


        $detail = $dom->savehtml();
        $porciones = explode("<hr>", $detail);
        $post->content = $detail;
        $post->summary = $porciones[0];
        $nada = strip_tags($porciones[0]);
        $cadena = trim($nada, "[\n|\r|\n\r]");
        $post->description = $cadena;


        $post->where('post_id', $id)->update([
            'updated_at' => Carbon::now()  //date('Y-m-d G:i:s') DB::raw('NOW()')
        ]);
        $post->update();
        Session::flash('notif_type', 'success');
        Session::flash('notif', 'Post has been updated!');

        return redirect("/admin/post/$id/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('notif_type', 'success');
        Session::flash('notif', 'Post has been deleted!');

        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_ajax($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
                    'type' => 'success',
                    'msg' => 'Post has been deleted!'
        ]);
    }

}
