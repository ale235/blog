<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('backend.singlepage.avales.index', ['title' => $title]);
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
        $galeria = new Galeria([
            'titulo' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'lugar' => $request->get('lugar'),
            'anio' =>  $request->get('anio'),
            'resenia' => $request->get('content'),
            'slug' => $request->get('slug'),
            'orden' => (Galeria::all()->count() + 1),
            'estado' => 1,
        ]);
        $galeria->save();

        $count = 1;
        foreach ($request->files->all()['imggaleria'] as $img){
//            dd(url('/photos/shares').'/galeria/'.trim($request->get('titulo')).'/'.trim($request->get('titulo').'-'.$count));
//            dd(public_path('photos/shares').'/galeria/'.trim($request->get('title')).'/'.trim($request->get('title').'-'.$count));
            $galeriaimagen = new GaleriaImagen([
                'galeria_id' => $galeria->id,
                'titulo' => trim($request->get('title').'-'.$count.'.jpg'),
                'image_path' => url('/photos/shares').'/galeria/'.trim($request->get('title')).'/'.trim($request->get('title').'-'.$count.'.jpg')
            ]);
            $img->move(public_path('/photos/shares/galeria/').trim($request->get('title')), trim($request->get('title').'-'.$count).'.jpg');
            $count++;
            $galeriaimagen->save();
        }

        return view('backend.singlepage.galeria.create',['title' => 'lala']);

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
}
