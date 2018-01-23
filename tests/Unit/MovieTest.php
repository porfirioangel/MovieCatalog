<?php

namespace Tests\Feature;

use App\Movie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Unit\GenericTests;

class MovieTest extends TestCase
{
    public function testGetMovies()
    {
        GenericTests::setTestCase($this);

        $response = $this->call('GET', 'api/movie_list');

        $status = $response->getStatusCode();
        GenericTests::testExpectedStatus(200, $status);

        $content = json_decode($response->getContent(), true);
        $expectedAttributes = ['genre', 'id', 'title', 'year'];
        GenericTests::testEachElementAttributes($expectedAttributes, $content);
    }

    public function testInsertMovie()
    {
        GenericTests::setTestCase($this);

        $parameters = [
            'title' => 'Mi Villano Favorito',
            'genre' => 'Children',
            'year' => '2010'
        ];

        $response = $this->call('POST', 'api/insert_movie', $parameters);

        $status = $response->getStatusCode();
        GenericTests::testExpectedStatus(200, $status);

        $content = json_decode($response->getContent(), true);
        $expectedAttributes = ['id', 'title', 'genre', 'year'];
        GenericTests::testExpectedAttributes($expectedAttributes, $content);
    }

    public function testDeleteMovie()
    {
        GenericTests::setTestCase($this);

        $moviesCount = Movie::all()->count();

        $movie = new Movie();
        $movie->title = 'Example';
        $movie->genre = 'Example';
        $movie->year = 1900;
        $movie->save();

        $newMoviesCount = Movie::all()->count();

        GenericTests::testAttributeValue($moviesCount + 1, $newMoviesCount,
            'MoviesCount');

        $parameters = [
            'movie_id' => $movie->id,
        ];

        $response = $this->call('DELETE', 'api/delete_movie', $parameters);

        $status = $response->getStatusCode();
        GenericTests::testExpectedStatus(200, $status);

        $newMoviesCount = Movie::all()->count();

        GenericTests::testAttributeValue($newMoviesCount, $moviesCount,
            'MoviesCount');

        $content = json_decode($response->getContent(), true);
        $expectedAttributes = ['id'];
        GenericTests::testExpectedAttributes($expectedAttributes, $content);
    }

}
