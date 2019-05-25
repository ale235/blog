<?php

use App\Models\Aval;
use App\Models\QuienesSomo;
use Illuminate\Database\Seeder;

class QuienesSomosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuienesSomo::create([
        'image_path' => '/photos/shares/quienessomos/JAJAlogopeque.png',
        'texto_uno' => 'J.A.J.A. es una organización productora de eventos culturales, cuya temática intenta englobar toda expresión artística juvenil, relacionada a la cultura freak global, con el objetivo de canalizar esta cultura, a través de diversas producciones artísticas. Entre las expresiones artísticas que reúne se encuentran, baile, canto, escultura, maquillaje, dibujo, arte digital, pintura, composición, producción local, cosplay, diseño de moda, ropa, imagen, fotografía, animación, videojuegos, entre otras. Las temáticas que incluye este movimiento son el comic, manga, historieta, anime, ciencia ficción, música, kpop, videojuegos, cine, televisión, series, etc.',
        'orden' => 1,
        'estado' => 1
    ]);
    }
}
