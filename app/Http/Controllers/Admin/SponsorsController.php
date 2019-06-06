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
            'orden' => (Sponsor::all()->count() + 1),
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
    public function show($id)
    {
        $title = 'Sponsor';
        $show = Sponsor::find($id);
        return view('backend.singlepage.sponsor.show', ['title' => $title, 'sponsor' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Sponsor';
        $edit = Sponsor::find($id);
        return view('backend.singlepage.sponsor.edit', ['title' => $title, 'sponsor' => $edit]);

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
        Sponsor::find($id)->update([
            'nombre' => $request->get('title'),
            'image_path' => $request->get('imgportada'),
            'slug' => $request->get('slug'),
        ]);

        return view('backend.singlepage.sponsor.index', ['title' => 'Sponsor', 'sponsors' => Sponsor::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sponsor = Sponsor::find($request->id);
        $sponsor->delete();

        return view('backend.singlepage.sponsor.index', ['title' => 'Sponsor', 'sponsors' => Sponsor::all()]);

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
