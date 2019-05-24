<?php


use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::create([
            'image_path' => '/photos/shares/sponsors/ejemplo/coca-cola.jpg',
            'nombre' => 'Coca-Cola',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'orden' => 1,
            'estado' => 1
        ]);
        Sponsor::create([
            'image_path' => '/photos/shares/sponsors/ejemplo/coca-cola.jpg',
            'nombre' => 'Artista 1',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'orden' => 2,
            'estado' => 1
        ]);
        Sponsor::create([
            'image_path' => '/photos/shares/sponsors/ejemplo/coca-cola.jpg',
            'nombre' => 'Artista 1',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'orden' => 3,
            'estado' => 1
        ]);
        Sponsor::create([
            'image_path' => '/photos/shares/sponsors/ejemplo/coca-cola.jpg',
            'nombre' => 'Artista 1',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'orden' => 4,
            'estado' => 1
        ]);
        Sponsor::create([
            'image_path' => '/photos/shares/sponsors/ejemplo/coca-cola.jpg',
            'nombre' => 'Artista 1',
            'slug' => 'www.facebook.com/alejandro.colautti',
            'orden' => 5,
            'estado' => 1
        ]);
    }
}
