<?php

namespace Tests\Feature;

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

    public function testInsertMovie() {
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

}
