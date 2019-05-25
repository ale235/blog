<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aval;
use App\Models\Galeria;
use App\Models\GaleriaImagen;
use Illuminate\Http\Request;

class AvalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Avales';
        $avales = Aval::all();
        return view('backend.singlepage.aval.index', ['title' => $title, 'avales' => $avales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Avales';
        return view('backend.singlepage.aval.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aval = new Aval([
            'image_path' => $request->get('imgportada'),
            'texto_uno' => $request->get('title'),
            'orden' => (Aval::all()->count() + 1),
            'estado' => 1,
        ]);
        $aval->save();

        return view('backend.singlepage.aval.create',['title' => 'lala']);

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

    public function ordenarAvales(Request $request)
    {

        $aval = Aval::find($request->id);
        $aval->orden = $request->orden;
        $aval->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoAvales(Request $request)
    {
        $aval = Aval::find($request->id);
        $aval->estado = $request->estado;
        $aval->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
