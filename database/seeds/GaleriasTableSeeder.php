<?php

use App\Models\Galeria;
use Illuminate\Database\Seeder;

class GaleriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/1.jpg',
            'nombre' => 'Primer Evento',
            'slug' => 'primer-evento',
            'orden' => 1,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/2.jpg',
            'nombre' => 'Segundo Evento',
            'slug' => 'segundo-evento',
            'orden' => 2,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/3.jpg',
            'nombre' => 'Tercer Evento',
            'slug' => 'tercer-evento',
            'orden' => 3,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/4.jpg',
            'nombre' => 'Cuarto Evento',
            'slug' => 'cuarto-evento',
            'orden' => 4,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/5.jpg',
            'nombre' => 'Quinto Evento',
            'slug' => 'quinto-evento',
            'orden' => 5,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/6.jpg',
            'nombre' => 'Sexto Evento',
            'slug' => 'sexto-evento',
            'orden' => 6,
            'estado' => 1
        ]);
    }
}
