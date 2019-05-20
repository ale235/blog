<?php

use App\Models\StandsYArtista;
use Illuminate\Database\Seeder;

class StandsYArtistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StandsYArtista::create([
            'image_path' => '/photos/shares/standsyartistas/ejemplo/ejemplo.jpg',
            'Nombre' => 'Artista 1',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'instagram' => 'ale235',
            'facebook' => 'alejandro.colautti',
            'orden' => 1,
            'estado' => 1
        ]);
    }
}
