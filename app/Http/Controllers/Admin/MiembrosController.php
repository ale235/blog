<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\GaleriaImagen;
use App\Models\Miembro;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Miembros';
        $miembros = Miembro::all();
        return view('backend.singlepage.miembro.index', ['title' => $title, 'miembros' => $miembros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Miembros';
        return view('backend.singlepage.miembro.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $miembro = new Miembro([
            'titulo' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'twitter' => $request->get('twitter'),
            'texto_uno' => $request->get('text_uno'),
            'texto_dos' => $request->get('texto_dos'),
            'facebook' =>  $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'slug' => $request->get('slug'),
            'orden' => (Miembro::all()->count() + 1),
            'estado' => 1,
        ]);
        $miembro->save();

        return view('backend.singlepage.miembro.create',['title' => 'lala']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show(Galeria $galeria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galeria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {
        //
    }

    public function ordenarMiembros(Request $request)
    {

        $miembro = Miembro::find($request->id);
        $miembro->orden = $request->orden;
        $miembro->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoMiembros(Request $request)
    {
        $miembro = Miembro::find($request->id);
        $miembro->estado = $request->estado;
        $miembro->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
