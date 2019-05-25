<?php

use App\Models\Aval;
use Illuminate\Database\Seeder;

class AvalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aval::create([
        'image_path' => '/photos/shares/avales/declaracion.jpg',
        'texto_uno' => 'sdfdsafddsfd',
        'orden' => 1,
        'estado' => 1
    ]);
    }
}
