<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(PostsTableSeeder::class);
         $this->call(HeadersTableSeeder::class);
         $this->call(GaleriasTableSeeder::class);
         $this->call(GaleriaImagensTableSeeder::class);
         $this->call(StandsYArtistasTableSeeder::class);
         $this->call(SponsorsTableSeeder::class);
         $this->call(MiembrosTableSeeder::class);
         $this->call(AvalesTableSeeder::class);
         $this->call(QuienesSomosTableSeeder::class);
         $this->call(ConcursosYMuestrasTableSeeder::class);
         $this->call(ConcursosYMuestrasImagensTableSeeder::class);
    }
}
