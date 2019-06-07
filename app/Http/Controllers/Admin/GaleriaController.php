<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\GaleriaImagen;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Galeria';
        $galerias = Galeria::all();
        return view('backend.singlepage.galeria.index', ['title' => $title, 'galerias' => $galerias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Galeria';
        return view('backend.singlepage.galeria.create', ['title' => $title]);
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
                'image_path' => '/photos/shares/galeria/'.str_replace(' ','',$request->get('title')).'/'.str_replace(' ', '',$request->get('title').'-'.$count.'.jpg'),
                'orden' => (Galeria::all()->count() + 1),
            ]);
            $img->move(public_path('/photos/shares/galeria/').str_replace(' ','',$request->get('title')), str_replace(' ','',$request->get('title').'-'.$count).'.jpg');
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
    public function edit($id)
    {
        $title = 'Galeria';
        $editgaleria = Galeria::find($id);
        $editgaleriaimagenes = GaleriaImagen::where('galeria_id',$editgaleria->id)->get();
        //dd($editgaleriaimagenes);
        return view('backend.singlepage.galeria.edit', ['title' => $title, 'galeria' => $editgaleria, 'galeriaimagenes' => $editgaleriaimagenes]);
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
//        dd($request);
        Galeria::find($id)->update([
            'titulo' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'lugar' => $request->get('lugar'),
            'anio' =>  $request->get('anio'),
            'resenia' => $request->get('content'),
            'slug' => $request->get('slug'),
            'orden' => (Galeria::all()->count() + 1),
            'estado' => 1,
        ]);
        $count = 1;
        if(isset($request->files->all()['imggaleria']))
        foreach ($request->files->all()['imggaleria'] as $img){
            $galeriaimagen = new GaleriaImagen([
                'galeria_id' => $id,
                'titulo' => trim($request->get('title').'-'.$count.'.jpg'),
                'image_path' => '/photos/shares/galeria/'.str_replace(' ','',$request->get('title')).'/'.str_replace(' ','',$request->get('title').'-'.$count.'.jpg')
            ]);
            $img->move(public_path('/photos/shares/galeria/').str_replace(' ','',$request->get('title')), str_replace(' ','',$request->get('title').'-'.$count).'.jpg');
            $count++;
            $galeriaimagen->save();
        }

        return view('backend.singlepage.galeria.index', ['title' => 'Galeria', 'galerias' => Galeria::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = Galeria::find($id);
        GaleriaImagen::where('galeria_id','=',$galeria->id)->delete();
        $galeria->delete();
        return view('backend.singlepage.galeria.index', ['title' => 'Galeria', 'galerias' => Galeria::all()]);

    }

    public function destroyimagen(Request $request, $id)
    {
//        dd($id);
        $galeriaimagen = GaleriaImagen::find($id);
        $aux = $galeriaimagen->galeria_id;
        $galeriaimagen->delete();
        $title = 'Galeria';

        $editgaleria = Galeria::find($aux);
        $editgaleriaimagenes = GaleriaImagen::where('galeria_id',$editgaleria->id)->get();
        //dd($editgaleriaimagenes);
        return view('backend.singlepage.galeria.edit', ['title' => $title, 'galeria' => $editgaleria, 'galeriaimagenes' => $editgaleriaimagenes]);
    }

    public function ordenarGalerias(Request $request)
    {

        $galeria = Galeria::find($request->id);
        $galeria->orden = $request->orden;
        $galeria->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoGalerias(Request $request)
    {
        $galeriaimagen = GaleriaImagen::find($request->id);
        $galeriaimagen->estado = $request->estado;
        $galeriaimagen->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }

    public function ordenarGaleriasInterior(Request $request)
    {

        $galeria = GaleriaImagen::find($request->id);
        $galeria->orden = $request->orden;
        $galeria->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoGaleriasInterior(Request $request)
    {
        $galeria = GaleriaImagen::find($request->id);
        $galeria->estado = $request->estado;
        $galeria->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
