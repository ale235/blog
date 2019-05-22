<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\GaleriaImagen;
use App\Models\StandsYArtista;
use Illuminate\Http\Request;

class StandsYArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Stands y Artistas';
        $standsYartistas = StandsYArtista::all();
        return view('backend.singlepage.standsyartista.index', ['standsyartistas' =>$standsYartistas, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Stands y Artistas';
        return view('backend.singlepage.standsyartista.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeria = new StandsYArtista([
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'instagram' =>  $request->get('instagram'),
            'facebook' => $request->get('facebook'),
            'slug' => $request->get('title'),
            'orden' => (StandsYArtista::all()->count() + 1),
            'estado' => 1,
        ]);
//        dd($request,$galeria);
        $galeria->save();

        return view('backend.singlepage.standsyartista.create',['title' => 'Stands y Artistas']);

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

    public function ordenarServicios(Request $request)
    {
        $servicios = Servicios::find($request->id);
        $servicios->orden = $request->orden;
        $servicios->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoServicios(Request $request)
    {
        $servicios = Servicios::find($request->id);
        $servicios->estado = $request->estado;
        $servicios->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
