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
            'titulo' => 'Primer Evento',
            'anio' => '2007',
            'lugar' => 'La placita',
            'resenia' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'slug' => 'primer-evento',
            'orden' => 1,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/2.jpg',
            'titulo' => 'Segundo Evento',
            'anio' => '2007',
            'lugar' => 'La placita',
            'resenia' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'slug' => 'segundo-evento',
            'orden' => 2,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/3.jpg',
            'titulo' => 'Tercer Evento',
            'anio' => '2007',
            'lugar' => 'La placita',
            'resenia' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',

            'slug' => 'tercer-evento',
            'orden' => 3,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/4.jpg',
            'titulo' => 'Cuarto Evento',
            'anio' => '2007',
            'lugar' => 'La placita',
            'resenia' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',

            'slug' => 'cuarto-evento',
            'orden' => 4,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/5.jpg',
            'titulo' => 'Quinto Evento',
            'anio' => '2007',
            'lugar' => 'La placita',
            'resenia' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',

            'slug' => 'quinto-evento',
            'orden' => 5,
            'estado' => 1
        ]);
        Galeria::create([
            'image_path' => '/photos/shares/galeria/ejemplo/6.jpg',
            'titulo' => 'Sexto Evento',
            'anio' => '2007',
            'lugar' => 'La placita',
            'resenia' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',

            'slug' => 'sexto-evento',
            'orden' => 6,
            'estado' => 1
        ]);
    }
}
