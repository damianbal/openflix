<?php

use Illuminate\Database\Seeder;

use App\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GenreSeeder::class);


        $movie = Movie::create();
        factory(Movie::class, 30)->create();
    }

}
