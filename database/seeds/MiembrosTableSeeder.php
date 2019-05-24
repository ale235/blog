<?php

use App\Models\Miembro;
use App\Models\StandsYArtista;
use Illuminate\Database\Seeder;

class MiembrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Miembro::create([
        'image_path' => '/photos/shares/miembros/ejemplo/ejemplo.jpg',
        'Nombre' => 'Artista 1',
        'texto_uno' => 'sdfdsafddsfd',
        'texto_dos' => 'sdfdsafddfdsfdsfdsfdfddsfd',
        'slug' => 'www.facebook.com/alejandro.colautti',
        'instagram' => 'ale235',
        'facebook' => 'alejandro.colautti',
        'twitter' => 'alejandro.colautti',
        'orden' => 1,
        'estado' => 1
    ]);
        Miembro::create([
            'image_path' => '/photos/shares/standsyartistas/ejemplo/ejemplo.jpg',
            'Nombre' => 'Artista 1',
            'texto_uno' => 'sdfdsafddsfd',
            'texto_dos' => 'sdfdsafddfdsfdsfdsfdfddsfd',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'instagram' => 'ale235',
            'facebook' => 'alejandro.colautti',
            'twitter' => 'alejandro.colautti',
            'orden' => 2,
            'estado' => 1
        ]);
        Miembro::create([
            'image_path' => '/photos/shares/standsyartistas/ejemplo/ejemplo.jpg',
            'Nombre' => 'Artista 1',
            'texto_uno' => 'sdfdsafddsfd',
            'texto_dos' => 'sdfdsafddfdsfdsfdsfdfddsfd',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'instagram' => 'ale235',
            'facebook' => 'alejandro.colautti',
            'twitter' => 'alejandro.colautti',
            'orden' => 3,
            'estado' => 1
        ]);
    }
}
