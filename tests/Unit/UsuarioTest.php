<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Unit\GenericTests;

class UsuarioTest extends TestCase
{
    public function testCorrectLogin()
    {
        GenericTests::setTestCase($this);

        $parameters = [
            'email' => 'porfirioads@gmail.com',
            'password' => 'holamundo'
        ];

        $response = $this->call('POST', 'api/login', $parameters);

        $status = $response->getStatusCode();
        GenericTests::testExpectedStatus(200, $status);

        $content = json_decode($response->getContent(), true);
        $expectedAttributes = ['id', 'name', 'lastname', 'email'];
        GenericTests::testExpectedAttributes($expectedAttributes, $content);
    }

    public function testIncorrectLogin()
    {
        GenericTests::setTestCase($this);

        $parameters = [
            'email' => 'porfirioads@gmail.com',
            'password' => 'holamundoodnumaloh'
        ];

        $response = $this->call('POST', 'api/login', $parameters);

        $status = $response->getStatusCode();
        GenericTests::testExpectedStatus(400, $status);

        $content = json_decode($response->getContent(), true);
        $expectedAttributes = ['error'];
        GenericTests::testExpectedAttributes($expectedAttributes, $content);
    }
}
