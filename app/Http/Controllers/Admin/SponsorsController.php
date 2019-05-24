<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\GaleriaImagen;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Sponsors';
        $sponsors = Sponsor::all();
        return view('backend.singlepage.sponsor.index', ['title' => $title, 'sponsors' => $sponsors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Sponsors';
        return view('backend.singlepage.sponsor.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sponsor = new Sponsor([
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'slug' => $request->get('slug'),
            'orden' => (Galeria::all()->count() + 1),
            'estado' => 1,
        ]);
        $sponsor->save();


        return view('backend.singlepage.sponsor.create',['title' => 'Sponsors']);

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

    public function ordenarSponsors(Request $request)
    {

        $sponsor = Sponsor::find($request->id);
        $sponsor->orden = $request->orden;
        $sponsor->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
    public function cambiarEstadoSponsors(Request $request)
    {
        $sponsor = Sponsor::find($request->id);
        $sponsor->estado = $request->estado;
        $sponsor->update();
//        $data = $request->all(); // This will get all the request data.
//        var_dump($data);
//        dd($data); // This will dump and die
    }
}
