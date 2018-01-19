<?php

use App\Movie;
use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++) {
            Movie::create([
                'id' => $i,
                'title' => 'Rápido y Furioso ' . $i,
                'genre' => 'Action',
                'year' => '201' . ( 9 - $i)
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            Movie::create([
                'id' => 10 + $i,
                'title' => 'Harry Potter ' . $i,
                'genre' => 'Fantasy',
                'year' => '201' . ($i)
            ]);
        }

    }

}
