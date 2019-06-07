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
        $standsyartista = new StandsYArtista([
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'instagram' =>  $request->get('instagram'),
            'facebook' => $request->get('facebook'),
            'slug' => $request->get('title'),
            'orden' => (StandsYArtista::all()->count() + 1),
            'estado' => 1,
        ]);
//        dd($request,$galeria);
        $standsyartista->save();

        return view('backend.singlepage.standsyartista.create',['title' => 'Stands y Artistas']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Stand y/o Artista';
        $show = StandsYArtista::find($id);
        return view('backend.singlepage.standsyartista.show', ['title' => $title, 'standyartista' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Stand y/o Artista';
        $edit = StandsYArtista::find($id);
        return view('backend.singlepage.standsyartista.edit', ['title' => $title, 'standyartista' => $edit]);
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
        StandsYArtista::find($id)->update([
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'instagram' =>  $request->get('instagram'),
            'facebook' => $request->get('facebook'),
            'slug' => $request->get('slug'),

        ]);

        return view('backend.singlepage.standsyartista.index', ['title' => 'Stands Y Artistas', 'standsyartistas' => StandsYArtista::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $standsyartista = StandsYArtista::find($request->id);
        $standsyartista->delete();

        return view('backend.singlepage.standyartistas.index', ['title' => 'Stands y Artistas', 'standyartistas' => StandsYArtista::all()]);
    }

    public function ordenarStandsYArtistas(Request $request)
    {

        $sya = StandsYArtista::find($request->id);
        $sya->orden = $request->orden;
        $sya->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoStandsYArtistas(Request $request)
    {
        $sya = StandsYArtista::find($request->id);
        $sya->estado = $request->estado;
        $sya->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
