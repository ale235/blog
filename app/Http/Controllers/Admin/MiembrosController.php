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
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'twitter' => $request->get('twitter'),
            'texto_uno' => $request->get('texto_uno'),
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
    public function show($id)
    {
        $title = 'Miembro';
        $show = Miembro::find($id);
        return view('backend.singlepage.miembro.show', ['title' => $title, 'miembro' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Miembros';
        $edit = Miembro::find($id);
        return view('backend.singlepage.miembro.edit', ['title' => $title, 'miembro' => $edit]);
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
        Miembro::find($id)->update([
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'twitter' => $request->get('twitter'),
            'texto_uno' => $request->get('texto_uno'),
            'texto_dos' => $request->get('texto_dos'),
            'facebook' =>  $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'slug' => $request->get('slug'),
        ]);

        return view('backend.singlepage.miembro.index', ['title' => 'Miembros', 'miembros' => Miembro::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $miembro = Miembro::find($request->id);
        $miembro->delete();
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
