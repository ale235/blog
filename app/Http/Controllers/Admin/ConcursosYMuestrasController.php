<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConcursoYMuestra;
use App\Models\ConcursoYMuestraImagen;
use App\Models\Galeria;
use App\Models\GaleriaImagen;
use Illuminate\Http\Request;

class ConcursosYMuestrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Concursos y Muestras';
        $concursosymuestras = ConcursoYMuestra::all();
        return view('backend.singlepage.concursoymuestra.index', ['title' => $title, 'concursosymuestras' => $concursosymuestras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Concursos y Muestras';
        return view('backend.singlepage.concursoymuestra.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $galeria = new ConcursoYMuestra([
            'titulo' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'lugar' => $request->get('lugar'),
            'anio' =>  $request->get('anio'),
            'resenia' => $request->get('content'),
            'slug' => $request->get('slug'),
            'orden' => (ConcursoYMuestra::all()->count() + 1),
            'estado' => 1,
        ]);
        $galeria->save();

        $count = 1;
        foreach ($request->files->all()['imggaleria'] as $img){
//            dd(url('/photos/shares').'/galeria/'.trim($request->get('titulo')).'/'.trim($request->get('titulo').'-'.$count));
//            dd(public_path('photos/shares').'/galeria/'.trim($request->get('title')).'/'.trim($request->get('title').'-'.$count));

            $galeriaimagen = new ConcursoYMuestraImagen([
                'concursosymuestra_id' => $galeria->id,
                'titulo' => trim($request->get('title').'-'.$count.'.jpg'),
                'image_path' => '/photos/shares/concursosymuestras/'.str_replace(' ', '',$request->get('title')).'/'.str_replace(' ', '',$request->get('title').'-'.$count.'.jpg'),
                'estado' => 1,
                'orden' => (ConcursoYMuestraImagen::all()->count() + 1),
            ]);
            $img->move(public_path('/photos/shares/concursosymuestras/').str_replace(' ', '',$request->get('title')), str_replace(' ', '',$request->get('title').'-'.$count).'.jpg');
            $count++;
            $galeriaimagen->save();
        }

        return view('backend.singlepage.concursoymuestra.create',['title' => 'lala']);

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
        $title = 'Concurso y Muestras';
        $editconcursoymuestra = ConcursoYMuestra::find($id);
        $editconcursoymuestraimagen = ConcursoYMuestraImagen::where('concursosymuestra_id',$editconcursoymuestra->id)->get();
        //dd($editgaleriaimagenes);
        return view('backend.singlepage.concursoymuestra.edit', ['title' => $title, 'concursoymuestra' => $editconcursoymuestra, 'concursosymuestrasimagenes' => $editconcursoymuestraimagen]);
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
        ConcursoYMuestra::find($id)->update([
            'titulo' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'lugar' => $request->get('lugar'),
            'anio' =>  $request->get('anio'),
            'resenia' => $request->get('content'),
            'slug' => $request->get('slug'),
        ]);
        $count = 1;
        foreach ($request->files->all()['imggaleria'] as $img){
            $galeriaimagen = new GaleriaImagen([
                'galeria_id' => $id,
                'titulo' => trim($request->get('title').'-'.$count.'.jpg'),
                'image_path' => '/photos/shares/concursosymuestras/'.trim($request->get('title')).'/'.trim($request->get('title').'-'.$count.'.jpg')
            ]);
            $img->move(public_path('/photos/shares/concursosymuestras/').trim($request->get('title')), trim($request->get('title').'-'.$count).'.jpg');
            $count++;
            $galeriaimagen->save();
        }

        return view('backend.singlepage.galeria.index', ['title' => 'Concurso y Muestra', 'concursosymuestras' => ConcursoYMuestra::all()]);
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

    public function destroyimagen($id)
    {
//        dd($id);
        $galeriaimagen = ConcursoYMuestraImagen::find($id);
        $aux = $galeriaimagen->galeria_id;
        $galeriaimagen->delete();
        $title = 'Galeria';

        $editgaleria = ConcursoYMuestra::find($aux);
        $editgaleriaimagenes = ConcursoYMuestraImagen::where('galeria_id',$editgaleria->id)->get();
        //dd($editgaleriaimagenes);
        return view('backend.singlepage.galeria.edit', ['title' => $title, 'concursoymuestra' => $editgaleria, 'concursosymuestrasimagenes' => $editgaleriaimagenes]);
    }

    public function ordenarConcursosYMuestras(Request $request)
    {

        $galeria = ConcursoYMuestra::find($request->id);
        $galeria->orden = $request->orden;
        $galeria->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoConcursosYMuestras(Request $request)
    {
        $galeria = ConcursoYMuestra::find($request->id);
        $galeria->estado = $request->estado;
        $galeria->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
