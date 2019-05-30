<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        dd();
        $title = 'Headers';
        $headers = Header::all();
        return view('backend.singlepage.header.index', ['title' => $title, 'headers' => $headers]);
       
    }

    public function create()
    {
        $title = 'Header';
        return view('backend.singlepage.header.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $header = new Header([
            'image_path' => $request->get('filepath'),
            'orden' => (Header::all()->count() + 1),
            'estado' => 1,
        ]);
        $header->save();

        return view('backend.singlepage.header.index',['title' => 'lala']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = Header::find($id);
//        dd($header);
        return view('backend.singlepage.header.show',['title' => 'Mostrar']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Header::find($id);
//        dd($header);
        return view('backend.singlepage.header.edit',['title' => 'Editar', 'header' => $header]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $header = Header::find($id);
        $header->image_path = $request->get('filepath');
        $header->update();

        return view('backend.singlepage.header.index',[ 'title' => 'Headers','headers' => Header::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $header = Header::find($id);
        $header->delete();
        return redirect('/admin/singlepage/header');
    }

    public function ordenarHeader(Request $request)
    {

        $header = Header::find($request->id);
        $header->orden = $request->orden;
        $header->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoHeader(Request $request)
    {
        $header = Header::find($request->id);
        $header->estado = $request->estado;
        $header->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }

}
