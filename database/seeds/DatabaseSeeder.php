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
    }
}
