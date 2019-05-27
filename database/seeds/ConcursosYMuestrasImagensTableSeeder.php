<?php

use App\Models\ConcursoYMuestraImagen;
use Illuminate\Database\Seeder;

class ConcursosYMuestrasImagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConcursoYMuestraImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/1.jpg',
            'titulo' => 'Primer Evento',
            'concursosymuestra_id' => '1',
            'orden' => 1,
            'estado' => 1
        ]);
        ConcursoYMuestraImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/2.jpg',
            'titulo' => 'Segundo Evento',
            'concursosymuestra_id' => '1',
            'orden' => 2,
            'estado' => 1
        ]);
        ConcursoYMuestraImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/3.jpg',
            'titulo' => 'Tercer Evento',
            'concursosymuestra_id' => '1',
            'orden' => 3,
            'estado' => 1
        ]);
        ConcursoYMuestraImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/1.jpg',
            'titulo' => 'Primer Evento',
            'concursosymuestra_id' => '1',
            'orden' => 4,
            'estado' => 1
        ]);
        ConcursoYMuestraImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/2.jpg',
            'titulo' => 'Segundo Evento',
            'concursosymuestra_id' => '1',
            'orden' => 5,
            'estado' => 1
        ]);
        ConcursoYMuestraImagen::create([
            'image_path' => '/photos/shares/galeria/ejemplo/3.jpg',
            'titulo' => 'Tercer Evento',
            'concursosymuestra_id' => '1',
            'orden' => 6,
            'estado' => 1
        ]);
    }
}
