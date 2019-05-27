<?php

use App\Models\Header;
use Illuminate\Database\Seeder;

class HeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Header::create([
            'image_path' => '/photos/shares/headers/welcome.png',
            'orden' => 1,
            'estado' => 1
        ]);
    }
}
