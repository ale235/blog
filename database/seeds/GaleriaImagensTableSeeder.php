<?php

use App\Models\GaleriaImagen;
use Illuminate\Database\Seeder;

class GaleriaImagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GaleriaImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/1.jpg',
            'titulo' => 'Primer Evento',
            'galeria_id' => '1',
            'orden' => 1,
            'estado' => 1
        ]);
        GaleriaImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/2.jpg',
            'titulo' => 'Segundo Evento',
            'galeria_id' => '1',
            'orden' => 2,
            'estado' => 1
        ]);
        GaleriaImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/3.jpg',
            'titulo' => 'Tercer Evento',
            'galeria_id' => '1',
            'orden' => 3,
            'estado' => 1
        ]);
        GaleriaImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/1.jpg',
            'titulo' => 'Primer Evento',
            'galeria_id' => '1',
            'orden' => 4,
            'estado' => 1
        ]);
        GaleriaImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/2.jpg',
            'titulo' => 'Segundo Evento',
            'galeria_id' => '1',
            'orden' => 5,
            'estado' => 1
        ]);
        GaleriaImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/3.jpg',
            'titulo' => 'Tercer Evento',
            'galeria_id' => '1',
            'orden' => 6,
            'estado' => 1
        ]);
    }
}
