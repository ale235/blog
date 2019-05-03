<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create(
            [
                'title' => '¡Hola Mundo!',
                'slug' => 'hola_mundo',
                'descripcion' => 'Este es un post de prueba...',
                'summary' => '<h1>Hola Mundo</h1><br><p>Esto es un post de prueba</p>',
                'content' => '<h1>Hola Mundo</h1><br><p>Esto es un post de prueba</p>',
                'created_at' => '2017-08-07 01:09:20',
                'updated_at' => '2017-08-06 22:09:20',
                'seen' => 1,
                'published' => 1,
                'user_id' => 1,
            ]
        );

    }
}
