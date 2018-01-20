<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Unit\GenericTests;

class MovieTest extends TestCase
{
    public function testCorrectLogin()
    {
        GenericTests::setTestCase($this);

        $response = $this->call('GET', 'api/movie_list');

        $status = $response->getStatusCode();
        GenericTests::testExpectedStatus(200, $status);

        $content = json_decode($response->getContent(), true);
        $expectedAttributes = ['genre', 'id', 'title', 'year'];
        GenericTests::testEachElementAttributes($expectedAttributes, $content);
    }

}
