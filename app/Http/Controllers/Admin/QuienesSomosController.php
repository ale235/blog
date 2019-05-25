<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aval;
use App\Models\Galeria;
use App\Models\QuienesSomo;
use Illuminate\Http\Request;

class QuienesSomosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Quienes Somos';
        $quienessomos = QuienesSomo::all();
        return view('backend.singlepage.quienessomo.index', ['title' => $title, 'quienessomos' => $quienessomos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Quienes Somos';
        return view('backend.singlepage.quienessomo.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quienessomo = new QuienesSomo([
            'image_path' => $request->get('imgportada'),
            'texto_uno' => $request->get('title'),
            'orden' => (Aval::all()->count() + 1),
            'estado' => 1,
        ]);
        $quienessomo->save();

        return view('backend.singlepage.quienessomo.create',['title' => 'lala']);

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

    public function ordenarQuienesSomos(Request $request)
    {

        $quienessomo = QuienesSomo::find($request->id);
        $quienessomo->orden = $request->orden;
        $quienessomo->update();
    }
    public function cambiarEstadoQuienesSomos(Request $request)
    {
        $quienessomo = QuienesSomo::find($request->id);
        $quienessomo->estado = $request->estado;
        $quienessomo->update();
    }
}
