<?php
/**
 * Created by PhpStorm.
 * User: porfirio
 * Date: 1/19/18
 * Time: 12:29 PM
 */

namespace Tests\Unit;


use Tests\TestCase;

class GenericTests
{
    private static $testCase;

    public static function setTestCase(TestCase $testCase)
    {
        GenericTests::$testCase = $testCase;
    }

    public static function testExpectedStatus($expected, $obtained)
    {
        GenericTests::$testCase->assertTrue($expected == $obtained,
            'Se esperaba el status ' . $expected . ' y se obtuvo ' .
            $obtained);
    }

    public static function testExpectedAttributes($expected, $obtained)
    {
        sort($expected);
        ksort($obtained);
        $esperados = '[' . implode(',', $expected) . ']';
        $obtenidos = '[' . implode(',', array_keys($obtained)) . ']';

        GenericTests::$testCase->assertTrue($esperados == $obtenidos,
            'Se esperaban los atributos ' . $esperados . ' y se obtuvieron' .
            $obtenidos);
    }
}